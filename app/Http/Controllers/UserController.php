<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.account')->with('user', Auth::user());
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'min:3',
            'email' => 'email',
            'password' => 'min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            'birth_date' => 'date|before:-18 years'
        ]);
    
        $user = Auth::user();

        $user->person->firstname = $request->firstname;
        $user->person->lastname = $request->lastname;

        if($request->gender == 'm') {
            $user->person->prefix = 'M';
        } elseif($request->gender == 'f') {
            $user->person->prefix = 'Mme';
        } else {
            $user->person->prefix = '';
        }

        $user->person->gender = $request->gender;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;

        if($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->person->save();

        return redirect()->back();
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
