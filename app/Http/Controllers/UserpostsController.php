<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use App\FileUpload;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class UserpostsController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();

        return view('home',compact('posts'));
    }

    public function show(Post $post)
    {
        $img = FileUpload::where('id', $post->image_id)->pluck('filename');

        return view('blog.showpost',compact('post','img'));
    }

    public function category($slug){

        $catid = Categorie::where('name','=',$slug)->pluck('id');

        $posts = Post::latest()->where('category_id',$catid)->get();


        return view('home',compact('posts'));

    }
}
