<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
   
    public function creates  ()
  {

    return view('admin');
  } 
          
  public function logins(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users|email',
          'roll' => 'required',
          'password' => 'required|confirmed',
      ]);

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'roll'=> $request->roll,
          'password' => Hash::make($request->password),
          

      ]);

   
      return redirect('UserHome');
  }

}







