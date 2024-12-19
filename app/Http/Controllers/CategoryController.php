<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories= Category::paginate(5);
        return view("categories.category",compact("categories"));
    }
    public function show($id){


        $category=Category::findOrFail( $id);
        return view("categories.show",compact("category"));
}


     public function create(){

        return view("categories.create");
     }
     public function store(Request $request){

     $data=   $request->validate([
            "name"=> "required|string",
            "description"=>"required",
            "image"=>"required|image|mimes:png,jpg,pdf,jpeg,webp",
            ]);

            $imagePath = Storage::putFile("categories", $request->file('image'));

            // إضافة مسار الصورة إلى البيانات
            $data['image'] = $imagePath;

            // حفظ البيانات
            Category::create($data);
        session()->flash("success","Data Created successfuly");
           return redirect()->route("categories");
     }

     public function edit($id){

$category=Category::findOrFail( $id);
return view("categories.edit",compact("category"));
     }

     public function update(Request $request, $id){
        session()->flash("success","Data Updated successfuly");

     $data=   $request->validate([
        "name"=>"required|string",
        "description"=> "required",
        "image"=>"nullable|image|mimes:png,jpg,pdf,jpeg,webp",
        ]);


       $category= Category::findOrFail( $id );

       if ($request->has("image")) {
        if(Storage::exists($category->image)){
            Storage::delete($category->image);
        };
        // unlink

        $data['image']  = Storage::putFile("categories", $request->file('image'));

        // إضافة مسار الصورة إلى البيانات
        // $data['image'] = $imagePath;

    }


        $category->update($data);
        return redirect()->route("categories");
 }

public function destroy($id){

$data=Category::findOrFail($id);
Storage::delete($data->image);
$data->delete();
session()->flash("success","Data Delted successfuly");
return redirect()->route("categories");

}

}