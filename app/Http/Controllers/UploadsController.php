<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\FileUpload;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;


class UploadsController extends Controller
{
    public function upload()
    {
        $img =FileUpload::latest()->get();

        return view('cms.upload',compact('img'));
    }

    public function uploadSubmit(UploadRequest $request)
    {
        foreach ($request->photos as $photo) {
            $name = $photo->getClientOriginalName();
            $exists = Storage::disk('public')->exists($name);


            if ($exists){
                return back()->withErrors([
                    'message' => 'File allready Exists!'
                ]);
            }

            $filepath = $photo->storeAs('public' , $name);
            $filename = basename($filepath);

            FileUpload::create([
                'post_id' => '0',
                'filename' => $filename
            ]);
        }
        return redirect('/admin/upload');
    }

    public function delete(Request $request)
    {
        $image = $request->categorie[0];
        $delete = FileUpload::where('filename',$image);
        $deleteId = $delete->pluck('id');

        $post = Post::where('image_id','=', $deleteId)->first();

        if ($post ) {
            $post->image_id = null;
            $post->save();
        }
        if ($delete){
            $delete->delete();
            Storage::disk('public')->delete($image);
            return back();
        }else return back()->withErrors([
            'message' => 'Delete was not done!'
        ]);
    }
}
