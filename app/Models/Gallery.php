<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function destr()
    {
//        dd($this->photos);
        foreach ($this->photos as $photo) {
            $photo->destr();
        }
        Storage::delete($this->preview);
        $this->delete();
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
