<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
   public function signup()
   {
    return view('auth.signup');
   }
   public function do_signup(Request $request)
   {
    $request->validate([
        'name' => 'required',
        'password'=> 'required',
        // 'email'=>'unique'
    ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = md5($request['password']);
    $user->save();
   }
   public function signin()
   {
    return view('auth.signin');
   }
   public function do_signin(Request $req)
   {
    $email = $req['email'];
    $pass = md5($req['password']);
    if ($email != "") {
        if (User::where('email', '=', $email)->exists()) {
            $data = User::where('email', '=', $email)->first();
            if ($pass == $data->password) {
                $session_data = [
                    'id'=>$data->id,
                    'name' => $data->name,
                    'password' => $pass,
                    'logged_in' => true
                ];
                session()->put($session_data);
                echo"login success";
                var_dump(session()->all());
                
            } else {
               echo "Password Wrong";
            }
        } else {
            echo"Email doesnot exist";
        }
    }
    echo"login succ234234s";
   }
}
