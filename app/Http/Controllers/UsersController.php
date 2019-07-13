<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //check for password change
        if($request->filled('new_password')){
            if(Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            }
        }
        //check for email change
        if($request->filled('email')){
            if(Hash::check($request->password, $user->password)) {
                $user->email = $request->email;
                $user->save();
            }
        }
        //check for phone change
        if($request->filled('phone_1')){
            if(Hash::check($request->password, $user->password)) {
                $user->phone_1 = $request->phone_1;
                $user->ready = true;
                $user->save();
            }
        }
        //check for phone 2 change
        if($request->filled('phone_2')){
            if(Hash::check($request->password, $user->password)) {
                $user->phone_2 = $request->phone_2;
                $user->ready = true;
                $user->save();
            }
        }

        return redirect(route('account.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
