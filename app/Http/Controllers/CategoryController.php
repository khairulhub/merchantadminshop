<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\storelist;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // /////////// All Category  Details ///////////////////////////

    public function Allcategory(){
        $categories = Category::latest()->get();
       return view('merchant.backend.category.all_category', compact('categories'));
   }
   // Add Category
   public function Addcategory(){
       $storelist = storelist::latest()->get();
       return view('merchant.backend.category.add_category', compact('storelist'));
   }

   // Store Category
     public function Storecategory(Request $request){

       Category::insert([
           'store_id' => $request->store_id,
           'category_name' => $request->category_name,

       ]);
       $notification= array(
           'message' => 'Category Added Successfully',
           'alert-type' =>'success'
       );
       return redirect()->route('all.category')->with($notification);
   }




   // Edit Category
   public function Editcategory($id){
       $category = Category::find($id);
       $storelist = storelist::latest()->get();
       return view('merchant.backend.category.edit_category', compact('category', 'storelist'));
   }



   //  Update Category
   public function Updatecategory(Request $request){
    //this id come form the edit category page input type hidden field
       $cat_id = $request->id;

       Category::find($cat_id)->update([
           'store_id' => $request->store_id,
           'category_name' => $request->category_name,
       ]);
       $notification= array(
           'message' => 'Category Updated  Successfully',
           'alert-type' =>'success'
       );
       return redirect()->route('all.category')->with($notification);
   }


   // Delete Category
   public function Deletecategory($id){
       Category::find($id)->delete();


       $notification= array(
          'message' => 'Category Deleted Successfully',
           'alert-type' =>'success'
       );
       return redirect()->back()->with($notification);
   }

}
