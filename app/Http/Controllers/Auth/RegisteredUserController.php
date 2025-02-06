<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'mobile' => 'required|digits_between:8,15',
            'country' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:500',
        ]);
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile']?? null,
            'country' => $validatedData['country'] ?? null,
            'address' => $validatedData['address']?? null,
            'password' => Hash::make($validatedData['password']),
        ]);

        $token ='Bearer ' . $user->createToken('access_token')->plainTextToken;

        event(new Registered($user));

        Auth::login($user);

        return response()->json(['message' => 'User registered successfully','data'=>$user,'token'=>$token], 201);

    }



}
