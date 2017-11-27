<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class Categorie extends Model
{
    use NestableTrait;
    protected $parent = 'id_parent';

    protected $fillable = ['name', 'parent_id', 'slug','id'];

    public $timestamps = false;

}
