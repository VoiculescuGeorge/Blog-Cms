<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body','id','updated_at','created_at','category_id','image_id'];

    public function image()
    {
        return $this->hasMany('App\FileUpload');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categorie');
    }
}
