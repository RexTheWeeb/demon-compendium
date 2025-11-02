<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demon;
use App\Models\Race;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalDemons = Demon::count();
        $totalRaces = Race::count();
        $totalUsers = User::count();

        $recentDemons = Demon::latest()->take(5)->get();

        // Pass data to the home view
        return view('home', compact('totalDemons', 'totalRaces', 'totalUsers', 'recentDemons'));
    }
}
