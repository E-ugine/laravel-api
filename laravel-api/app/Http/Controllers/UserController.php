<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $incomingRequest = $request->validate([
            'name' => ['required', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        // Hash the password
        $incomingRequest['password'] = bcrypt($incomingRequest['password']);

        // Create a new user in the database
        $user = User::create($incomingRequest);
 
        // Log the user in
        auth('web')->login($user);

        // Redirect to the homepage
        return redirect('/');
    }

    public function login(Request $request){
      $incomingRequest = $request->validate([
         'loginname' => ['required'],
         'loginpassword' => ['required'],
      ]);
      // Attempt to log the user in
     if (auth('web')->attempt(['name'=>$incomingRequest['loginname'],'password'=>$incomingRequest['loginpassword']])){
      $request->session()->regenerate();
     }
     return redirect('/');
   

}

      public function logout(Request $request)
      {
         // Log the user out
         auth('web')->logout();
   
         // Redirect to the homepage
         return redirect('/');
      }
}
