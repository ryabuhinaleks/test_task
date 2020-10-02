<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountRepository implements AccountRepositoryInterface
{   
    /**
     * Update the specified account in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update($id, Request $request)
    {
        $dataUser=$request->all();
        $dataUser['password']=Hash::make($request->password);
        User::find(Auth::User()->id)->update($dataUser);
    }

}