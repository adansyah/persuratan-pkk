<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.admin.Profile.index', compact('user'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.Profile.edit', compact('data'));
    }
}
