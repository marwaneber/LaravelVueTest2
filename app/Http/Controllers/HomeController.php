<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Items;

class HomeController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }

    public function showHomePage(){
        return view('home');
    }

    public function getAllItems(){
        // Send data by pagination of '3 per Page' and ordered by the date of create
        $items_data = Items::orderBy('created_at', 'desc')->paginate(3);
        return $items_data;
    }

    public function addNewItem(Request $request){
        // Extract the base64 of the image
        $exploded = explode(',', $request->image);

        // Decoding the image
        $image_decoded = base64_decode($exploded[1]);

        // Extract the extension of the image
        $image_extension = explode(';', str_replace("data:image/", "", $exploded[0]))[0];

        // Generate randomly a name of the image
        $image_file_name = str_random(10).'.'.$image_extension;

        // Create a path for the image
        $image_path = public_path() . "/uploads/" . $image_file_name;

        // Write the coded image
        file_put_contents($image_path, $image_decoded);

        // Store the item into the DB
        $item = new Items();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->image = "/uploads/" . $image_file_name;
        $item->save();

        // Return JSON response of success
        return response()->json([
            'user' => $item,
            'message' => 'Success'
          ], 200);
    }
}
