<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function view($slug){
        $brand = Brand::where('slug', $slug)->first();
        return view('frontend.brand', ['brand' => $brand]);
    }


    public function store(Request $request){
        $brand = new Brand();

        $brand->name = $request->input('title');
        $brand->slug = str_slug($brand->name);

        $brand->save();
        return redirect('/admin/brand')->with('msg', 'Brand added successfully.');
    }

    public function destroy($id){
        echo $id;
        $brand = Brand::findOrFail($id);

        $brand->delete();
        return redirect('/admin/brand')->with('msg', 'Brand Deleted');
    }
}
