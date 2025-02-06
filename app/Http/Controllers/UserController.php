<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\storelist;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    
    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        $notification = [
            'message' => 'Logout successfully',
            'alert-type' => 'info',
        ];


        return redirect('/')->with($notification);
    }


    public function shopdetails($shop)
    {
        // Fetch the store based on the store name (passed as parameter)
        $storelist = storelist::where('store_name', $shop)->first();
        
        // Fetch the categories related to the store (using $storelist)
        $categories = Category::where('store_id', $storelist->id)->get();
        
        // Get the count of categories
        $categoriesCount = $categories->count();
        
        // Fetch the products related to the categories
        $products = Product::whereIn('category_id', $categories->pluck('id'))->get();
        
        // Get the count of products
        $productsCount = $products->count();
        
        // Return the shop details view with store, categories, and products
        return view('user.shopdetails', compact('storelist', 'categories', 'products', 'categoriesCount', 'productsCount'));
    }
    
    

}
