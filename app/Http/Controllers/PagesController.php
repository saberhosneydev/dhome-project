<?php

namespace App\Http\Controllers;


use \App\Home;
use \App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $homes = Home::latest()->limit(4)->get();
        return view('welcome', compact('homes'));
    }

 public function about(User $user) {
    return view('test', compact('user'));
}   
}
