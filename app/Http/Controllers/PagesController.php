<?php

namespace App\Http\Controllers;

use App\Home;
use App\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
	public function home() {
		$homes = Home::latest()->limit(4)->get();
		return view('welcome', compact('homes'));
	}

	public function about() {
		$home = new Home;
		return view('test', compact('home'));
	}

	public function storeFile(Request $request){
		// validate the uploaded file
		$validation = $request->validate([
		// for single file upload
        // 'photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        // for multiple file uploads
			'photos.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
		]);
		// store the uploaded file path/name || path/names
		$paths = [];
    	$files  = $validation['photos']; // get the validated file
    	foreach ($files as $file) {
    		$extension = $file->getClientOriginalExtension();
	    	// use below code if you want to customize file name , and make sure to change store method to storeAs and adding a second argument as $filename , note : $filename needs a tweaking since all files are uploaded at the same second so it overrides each others
			// $filename  = 'profile-photo-' . time() . '.' . $extension;
    		$paths[]  = $file->store('photos');
    	}
    	foreach ($paths as $path) {
    		Image::create([
    			'home_id' => 3,
    			'image_name' => $path,
    		]);
    	}
    	return redirect('/test');
    }
}
