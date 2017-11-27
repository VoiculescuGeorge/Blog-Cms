<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories = \DB::table('categories')->get();

        $html = Categorie::renderAsHtml();

        return view('cms.categories-cms',compact('categories', 'html'));
    }

    public function deleteCategorie(Request $request)
    {
        $cat = $request->categorie[0];
        $delete = Categorie::where('name',$cat);

        if ($delete){
            $delete->delete();
            return back();
        }else return back()->withErrors([
            'message' => 'Delete was not done!'
        ]);
    }

    public function insertCategorie(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);

        $cat = $request->categorie;
        $duplicate = Categorie::where('name',$request->name)->first();

        if ($duplicate){
            return back()->withErrors([
                'message' => 'Category allready exist!'
            ]);
        }else{
            $category = new Categorie;
            $category->create([
                'name' => $request->name,
                'parent_id' => $cat,
                'slug' => $request->name
            ]);
            return back();
        }
    }
}
