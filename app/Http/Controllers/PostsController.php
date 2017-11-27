<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Post;
use App\FileUpload;
use Illuminate\Http\Request;


class PostsController extends Controller
{

    public function showpost()
    {


        $posts = Post::latest()->get();

        return view('cms.posts-cms',compact('posts'));
    }

    public function updatepost(Post $post)
    {
        $categories = Categorie::all();

        $images = FileUpload::all();

        return  view('cms.editpost-cms',compact('post','categories','images'));
    }

    public function editpost(Post $post)
    {

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->find($post->id);

        $post->title = request('title');
        $post->body = request('body');

        if (request('category') == "Select Category for this post") {
            $post->category_id = null;
        }else $post->category_id= request('category');

        $post->save();

        return redirect('/admin/posts');
    }

    public function newpost()
    {
        $imgs = FileUpload::latest()->get();

        $categories = Categorie::all();

        return view('cms.newpost-cms',compact('imgs','categories'));
    }

    public function newpoststore(Post $post, PostRequest $request)
    {
        $name = $request->photos->getClientOriginalName();
        $exists = Storage::disk('public')->exists($name);


        if ($exists){
            return back()->withErrors([
                'message' => 'File allready Exists!'
            ]);
        }

        $filepath = $request->photos->storeAs('public' , $name);
        $filename = basename($filepath);

        FileUpload::create([
            'post_id' => '0',
            'filename' => $filename
        ]);

        $fileid = \DB::table('file_uploads')->where('filename', $filename)->value('id');


        $post->create([
            'title' => $request->title,
            'body' => $request->body,
            'image_id' => $fileid,
            'category_id' => $request->category
        ]);



        return redirect('/admin/posts');
    }

    public function deletepost($post)
    {
        $delete = Post::where('id',$post);

        if ($delete){
            $delete->delete();
            return back();
        }else return back()->withErrors([
            'message' => 'Delete was not done!'
        ]);
    }

}
