<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PharIo\Manifest\Email;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',

    ]);
         
       $user = User::where('email',$request->email)->first();
    if ($user->roll === null ) {
        Auth::logout();
        return redirect()->route('login')->with('error', 'Your role is not set. Please contact the administrator.');
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        
        return redirect('home');
    }

    return redirect()->route('login')->with('error', 'Invalid credentials');
}
//////////////
    // @if (auth()->check() && auth()->user()->roll ==='Admin')
    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
            return redirect('login');
    

     
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect('/');
    }
 
}