<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kodeine\Acl\Traits\HasRole;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRole;

    //  DELETED - может понадобиться в дальнейшем
    const STATUS_DELETED = 0;
    //  INACTIVE - статус будет присваиваться сразу после регистрации
    const STATUS_INACTIVE = 9;
    //  ACTIVE - статус будет даваться пользователю подтвердившему свой email
    const STATUS_ACTIVE = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verify_token', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user',
            'user_id',
            'role_id'
        );
    }

    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Проверить ключ подтверждения
     * @param $verify_token
     * @return bool
     */
    public function checkConfirmToken($verify_token): bool
    {
        if ($this->verify_token === $verify_token) {
            return true;
        }

        return false;

    }

    /**
     * возвращает имя статуса
     */
    public function statusName(): string
    {
        switch ($this->status) {
            case User::STATUS_DELETED:
                return 'удален';
            case User::STATUS_INACTIVE:
                return 'не подтвердил свой email';
            case User::STATUS_ACTIVE:
                return 'подтвердил свой email';
        }
    }

    public function news() {
        return $this->hasMany(News::class);
    }

}
