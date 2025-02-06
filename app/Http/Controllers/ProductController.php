<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\storelist;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    // /////////// All Products  Details ///////////////////////////

    public function Allproductlist(){
        $productlist = Product::latest()->get();
       return view('merchant.backend.product.all_product', compact('productlist'));
   }
   // Add Product
   public function Addproductlist(){
       $storelist = storelist::latest()->get();
       $categorylist = Category::latest()->get();
       return view('merchant.backend.product.add_product', compact('storelist','categorylist'));
   }

   // Store Product
     public function Storeproductlist(Request $request){

        Product::insert([
           'store_id' => $request->store_id,
           'category_id' => $request->category_id,
           'product_name' => $request->product_name,

       ]);
       $notification= array(
           'message' => 'Product Added Successfully',
           'alert-type' =>'success'
       );
       return redirect()->route('all.productlist')->with($notification);
   }




   // Edit Product
   public function Editproductlist($id){
       $productlist = Product::find($id);
       $categorylist = Category::latest()->get();
       $storelist = storelist::latest()->get();
       return view('merchant.backend.product.edit_product', compact('categorylist', 'storelist','productlist'));
   }



   //  Update Product
   public function Updateproductlist(Request $request){
    //this id come form the edit product page input type hidden field
       $cat_id = $request->id;

       Product::find($cat_id)->update([
           'store_id' => $request->store_id,
           'category_id' => $request->category_id,
           'product_name' => $request->product_name,
       ]);
       $notification= array(
           'message' => 'Category Updated  Successfully',
           'alert-type' =>'success'
       );
       return redirect()->route('all.productlist')->with($notification);
   }


   // Delete Product from
   public function Deleteproductlist($id){
    Product::find($id)->delete();


       $notification= array(
          'message' => 'Category Deleted Successfully',
           'alert-type' =>'success'
       );
       return redirect()->back()->with($notification);
   }
}
