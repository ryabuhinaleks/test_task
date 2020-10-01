<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the account
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account',['user'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new account
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created account in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified account
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified account
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified account in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'required' => 'Заполните поле',
            'email' => 'Email-адрес введен неправильно'
        ];
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required|email',
        ],$customMessages);


        $dataUser=$request->all();
        $dataUser['password']=Hash::make($request->password);
        User::find(Auth::User()->id)->update($dataUser);
    }

    /**
     * Remove the specified account from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
