<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class FileUpload extends Model
{
    protected $fillable = ['id','filename', 'post_id','updated_at','created_at'];

    public function image()
    {
        return $this->belongsTo('App\Post');
    }
}
