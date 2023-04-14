<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function listItem()
    {
    	$categories = Category::all();
    	$items = Item::all();

    	return view('item.list-item', [
    										'categories' => $categories,
    										'items' => $items
    		   						  ]);
    }

    public function createItem(Request $request)
    {
    	$validator = validator( request()->all(),
    	[
    		"category_id" 		=> "required",
    		"name_eng"  		=>"required",
    		"name_unicode"  	=>"required",
    		"photo" 			=>"required",
    	]);

		if($validator->fails())
		{
			return back()->with('info',"Please enter Data !");
		}

		$item 					= new Item();
		$item->category_id 		= request()->category_id;
		$item->name_eng 		=request()->name_eng;
		$item->name_unicode =request()->name_unicode;

		if($request->hasfile('photo'))
		{
			$file   = $request->file('photo');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$item->photo=$name;

		}
		else
		{
			$item->photo='';
		}

		$item->remark =request()->remark;
		$item->save();

		return redirect('/admin/item/list');
    }

    public function deleteItem()
    {
    	Item::find(request()->id)->delete();
    	return redirect('/admin/item/list');
    }

    public function updItem()
    {
    	$categories = Category::all();
    	$item = Item::find(request()->id);
    	return view('item.upd-item',[
    									'item' => $item,
    									'categories' => $categories
    								]);
    }

    public function updateItem(Request $request)
    {
    	$validator = validator( request()->all(),
    	[
    		"category_id" 		=> "required",
    		"name_eng"  		=>"required",
    		"name_unicode"  	=>"required",
    	]);

		if($validator->fails())
		{
			return back()->with('info',"Please enter Data !");
		}

		$item 					= Item::find(request()->id);
		$item->category_id 		= request()->category_id;
		$item->name_eng 		= request()->name_eng;
		$item->name_unicode =request()->name_unicode;

		if($request->hasfile('photo'))
		{
			$file   = $request->file('photo');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$item->photo=$name;

		}

		$item->remark =request()->remark;
		$item->save();

		return redirect('/admin/item/list');
    }

 }
