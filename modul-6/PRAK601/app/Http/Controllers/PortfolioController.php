<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('home', compact('profile'));
    }

    public function profile()
    {
        $profile = Profile::first();
        $experiences = Experience::all();
        return view('profile', compact('profile', 'experiences'));
    }

    public function detail($id)
    {
        $experience = Experience::findOrFail($id);
        return view('detail', compact('experience'));
    }
}