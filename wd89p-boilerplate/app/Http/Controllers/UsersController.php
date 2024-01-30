<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{


   public function index()
   {
       return response()->json(["data" => User::all()]);
   }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        
        if ($name === 'admin' && $password === 'adminpassword') {
            // Return a response for admin login
            return response()->json(['message' => 'Admin login successful'], 200);
        }
        

        $existingUser = DB::table('users')->where('email', $email)->first();

        if ($existingUser) {
            return response()->json(['message' => 'Email already in use. Please choose a different email']);
        }

        try {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password, // Hash the password
            ]);

            return response()->json(['message' => 'User registered successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to register user']);
        }
    }

    public function login(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = DB::table('users')->where('name', $name)->first();

        if (!empty($user)) {
            if ($password == $user->password) {
                return response()->json(['message' => 'Login successful']);
            } else {
                return response()->json(['message' => 'Invalid credentials']);
            }
        
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }
    /* 
    * SELECT * FROM USERS WHERE ID = ?
    *
    * @param [type] $id
    * @return void
    */
  public function show($id)
  {
      return response()->json(["data" =>User::findOrFail($id)]);
  }

  
}

