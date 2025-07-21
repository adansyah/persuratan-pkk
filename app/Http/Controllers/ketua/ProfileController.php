<?php

namespace App\Http\Controllers\ketua;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.ketua.Profile', compact('user'));
    }
}
