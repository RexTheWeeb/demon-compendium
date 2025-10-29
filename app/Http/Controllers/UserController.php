<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController
{
    public function show()
    {
        $user = Auth::user()->load('demons');
        return view('users.profile', compact('user'));
    }
}
