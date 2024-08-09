<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    function dashboardpage(){
        return redirect()->route('dashboard');
    }
    function regester(Request $req){
       // return $req->name;
       $validatedData = $req->validate([
        'name'  => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
    ], [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters long.',
    ]);

      $users = User::create($validatedData);

      if($users) {
         return redirect()->route('login');
      }
    }

  function login(Request $req) {
   $credentials = $req->validate([
    'email' => 'required|email',
    'password' => 'required'
   ]);

   if (Auth::attempt($credentials)) {
    return redirect()->route('dashboard');
    }
}
public function logout(Request $request)
{
    Auth::logout();

    // Invalidate the session to prevent session fixation
    $request->session()->invalidate();

    // Regenerate session token to prevent CSRF attacks
    $request->session()->regenerateToken();

    // Redirect to login page or any page you prefer
    return redirect()->route('login')->with('status', 'Successfully logged out!');
}

public function dasbordpage(){
    return view('dashboard');
}

}
