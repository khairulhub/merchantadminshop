<?php

namespace App\Http\Controllers;

use App\Models\storelist;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;




class MerchantController extends Controller
{
    public function merchantdashboard()
    {
        return view('merchant.index');
    }



    public function MerchantLogout(Request $request)
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



    public function AllstoreList(){
        $storelist = storelist::latest()->get();
        return view('merchant.backend.storelist.all_storelist', compact('storelist'));
    }

  // Add storelist
    public function AddstoreList(){
        return view('merchant.backend.storelist.add_storelist');
    }

// Store Category
public function Storestorelist(Request $request)
{
    $data = new storelist(); // Assuming you are storing in Storelist model

    if ($request->file('photo')) {
        $file = $request->file('photo');

        // Generate unique name for the image
        $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

        // Define the upload path
        $uploadPath = 'upload/store/';

        // Move the file to the storage path
        $file->move(public_path($uploadPath), $filename);

        // Save the image path in the database
        $data->photo = $uploadPath . $filename;
    }

    // Save other store details
    $data->store_name = $request->store_name;
    // $data->store_slug = strtolower(str_replace(' ', '-', $request->store_name));

    $data->save();

    // Notification message
    $notification = array(
        'message' => 'Store Name Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.storelist')->with($notification);
}




// edit category
public function Editstorelist($id){
    $storelist = storelist::find($id);
    return view('merchant.backend.storelist.edit_storelist', compact('storelist'));

}

// update category
public function Updatestorelist(Request $request)
{
    $store_id = $request->id;

    // Find the store by ID
    $storelist = Storelist::findOrFail($store_id); // Use findOrFail to ensure it exists

    if ($request->file('photo')) {
        // Delete the old image if it exists
        if (!empty($storelist->photo) && file_exists(public_path($storelist->photo))) {
            unlink(public_path($storelist->photo));
        }

        // Upload new image
        $file = $request->file('photo');
        $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $uploadPath = 'upload/store/';
        $file->move(public_path($uploadPath), $filename);

        // Update the store with the new image
        $storelist->update([
            'store_name' => $request->store_name,
            
            'photo' => $uploadPath . $filename,
        ]);

        $notification = [
            'message' => 'Store updated with image successfully',
            'alert-type' => 'success',
        ];
    } else {
        // Update store without changing the image
        $storelist->update([
            'store_name' => $request->store_name,
            
        ]);

        $notification = [
            'message' => 'Store updated without image successfully',
            'alert-type' => 'success',
        ];
    }

    return redirect()->route('all.storelist')->with($notification);
}

// delete category
public function DeleteCategory($id){
    $item = storelist::find($id);
    $img = $item->photo;
    unlink($img);

    storelist::find($id)->delete();


    $notification= array(
       'message' => 'Store Deleted Successfully',
        'alert-type' =>'success'
    );
    return redirect()->back()->with($notification);
}



//============== create categories ===============




}
