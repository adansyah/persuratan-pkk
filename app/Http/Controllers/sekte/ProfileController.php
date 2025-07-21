<?php

namespace App\Http\Controllers\sekte;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.sekretaris.Profile', compact('user'));
    }
}
