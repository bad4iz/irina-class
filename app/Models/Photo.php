<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gallery(){
        return $this->hasOne(Gallery::class);
    }

//    public static function add($fields)
//    {
//        $photo = new static;
//        $photo->fill($fields);
//        $photo->save();
//        $preview = $fields->file('preview')->store('images',);
//        $photo->
//        return $photo;
//    }

    public function destr()
    {
        Storage::delete($this->image);
        return $this->delete();
    }
}
