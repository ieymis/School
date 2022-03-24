<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RigesterController extends Controller
{

    public function rigester(Request $request)
    {

        $request->validate([
            'name' => ['required', 'alpha'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'mobile' => ['required'],

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,

        ]);

        $token = $user->createToken('key')->plainTextToken;
        return response()->json([
            'token' => $token,
            'message' => 'register was successfuly'
        ]);
    }
}
