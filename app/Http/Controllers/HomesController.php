<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomesController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::all();
        return view('homes.index', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|min:15',
            'city' => 'required|min:4',
            'description' => 'required|min:50',
            'image' => 'required',
            'saleprice' => 'required|integer'
        ]);
        Home::create([
            'sold' => 0,
            'location' => $request->location,
            'city' => $request->city,
            'description' => $request->description,
            'image' => $request->image,
            'saleprice' => $request->saleprice,
            'rentprice' => $request->saleprice/180,
            'slug' => Str::slug($request->city, '-').'-'.Str::slug($request->location, '-'),
            'user_id' => auth()->id()
        ]);
        // $home = new Home;
        // $home->location = $request->location;
        // $home->city = $request->city;
        // $home->description = $request->description;
        // $home->image = $request->image;
        // $home->saleprice = $request->saleprice;
        // $rentprice = $request->saleprice/180;
        // $home->rentprice = $rentprice;
        // $home->slug = $request->city.'.'.Str::random(5);
        // $home->slug = Str::slug($request->location, '-');
        // $home->slug = Str::slug($request->city, '-').'-'.Str::slug($request->location, '-');
        // $home->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        return view('homes.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        return view('homes.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        if ($request->rentprice == NULL) {
            $request->rentprice = $home->saleprice/180;
        }
        $request->validate([
            'location' => 'required|min:15',
            'city' => 'required|min:4',
            'description' => 'required|min:50',
            'image' => 'required',
            'saleprice' => 'required|integer'
        ]);
        $home->update([
            'location' => $request->location,
            'city' => $request->city,
            'description' => $request->description,
            'image' => $request->image,
            'saleprice' => $request->saleprice,
            'rentprice' => $request->rentprice
        ]);
        return redirect('/homes/'.$home->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        $home->delete();
        return redirect('/homes');
    }
    public function markSold(Home $home)
    {
        $home->update([
            'sold' => 1
        ]);
        return redirect('/homes/'.$home->slug);
    }
}
