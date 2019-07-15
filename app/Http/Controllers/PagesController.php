<?php

namespace App\Http\Controllers;

use App\Home;
use App\Image;
use App\Message;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class PagesController extends Controller
{

	public function home() {
		$homes = Home::latest()->limit(4)->get();
		return view('welcome', compact('homes'));
	}
	public function sendApp(Request $request) {
		$home = Home::where('slug', $request->homeSLUG)->first();
		$user = Auth::user()->id;
		Message::create([
			'homeID' => $home->id,
			'customerID' => $user,
			'done' => false
		]);
		return redirect('/homes/'.$request->homeSLUG)->with('message', 'Success');

	}

	public function getAppGet(){
		return view('raina');
	}
	public function getAppPost(){
		$messages = Message::all();
		$home = Home::class;
		$user = User::class;
		$msgs = array();
		foreach ($messages as $message) {
			$home = Home::where('id', $message->homeID)->get();
			$user = User::where('id', $message->customerID)->get();
			$msgs[$message->id]['home'] = $home;
			$msgs[$message->id]['user'] = $user;
			$msgs[$message->id]['done'] = $message->done;
		}
		return new Response($msgs);
	}
	public function search(Request $request) {
		$data=home::search($request->index)->get();
		return view("search",compact("data"));
	}
}

