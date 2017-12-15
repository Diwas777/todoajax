<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  
use  App\Item;

class todolistcontroller extends Controller
{
    //

    public function index()
    {
        $items=Item::all();
       // return $item;
    	return view('list',compact('items'));
    }

    public function create(request $request)
    {	
    	$item=new Item;
    	$item->item=$request->text;
    	$item->save();
    	return 'done';
    }


    public function delete(request $request)
    {
        Item::where('id',$request->id)->delete();
        return $request->all();
    }
}
