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
		$validation = $request->validate([
        'photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $file = $validation['photo'];
        $path = $file->store('photos');
        dd($path);
    	return redirect('/test');
    }
}
