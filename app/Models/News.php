<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, HasTrixRichText, SoftDeletes;
    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
