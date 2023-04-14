<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//use DB;

class CategoryController extends Controller
{
    public function listCategory()
    {
    	$categories = Category::all();

    	return view('category.list-category', [
    											 'categories' => $categories
    		   								  ]);
    }

    public function createCategory(Request $request)
    {
    	$validator = validator( request()->all(),
    	[
    		"name_eng"  =>"required",
    		"name_unicode"  =>"required",
    		"photo"  =>"required",
    	]);

		if($validator->fails())
		{
			return back()->with('info',"Please enter Data !");
		}

		$category = new Category();
		$category->name_eng =request()->name_eng;
		$category->name_unicode =request()->name_unicode;

		if($request->hasfile('photo'))
		{
			$file   = $request->file('photo');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$category->photo=$name;

		}
		else
		{
			$category->photo='';
		}

		$category->remark =request()->remark;
		$category->save();

		return redirect('/admin/category/list');
    }

    public function deleteCategory()
    {
    	$id = request()->id;
    	//DB::table('categories')->where("id","=","$id")->delete();
    	Category::find($id) -> delete();
    	return redirect('/admin/category/list')->with('info','Category Deleted Successfully!');
    }

    public function updCategory()
    {
    	//$categories = Category::all();
    	$category = Category::find(request()->id);

    	return view('category.upd-category', ['category' => $category]);
    }

    public function updateCategory(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "name_eng" 		 	=>"required",
            "name_unicode"  	=>"required",
            // "photo" 		 	=>"required",
        ]);

        if($validator->fails())
        {
            return back()->with('info',"Please Fill Data!");
        }

        $category = Category::find(request()->id);
        $category->name_eng =request()->name_eng;
        $category->name_unicode =request()->name_unicode;
        $category->remark =request()->remark;

       if($request->hasfile('photo'))
        {
            $file   = $request->file('photo');
            $name   = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $file->move('images/',$name);
            $category->photo=$name;

        }



        $category->save();

        return redirect('/admin/category/list');
    }
}
