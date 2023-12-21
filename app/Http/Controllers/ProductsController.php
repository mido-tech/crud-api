<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function adding(Request $request){
        $items=new products;
        $items->name=$request->name;
        $items->value=$request->value;
        $items->quantity=$request->quantity;
        $items->save();
        return response()->json('added successfuly');


    }

    public function edit(Request $request){
        $items=products::findorfail($request->id);
        $items->name=$request->name;
        $items->value=$request->value;
        $items->quantity=$request->quantity;
        $items->update();
        return response()->json('updated successfuly');
    }

    public function delete(Request $request){
        $items=products::findorfail($request->id)->delete();

        return response()->json('deleted successfuly');

    }

    public function getData(){
        $items=products::all();
        return response()->json($items);
    }
}


