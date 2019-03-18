<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;	
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
	public function home() {
		$homes = Home::latest()->limit(4)->get();
		return view('welcome', compact('homes'));
	}

	public function about() {
		return view('test');
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
    }
}
