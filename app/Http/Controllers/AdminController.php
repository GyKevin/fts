<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $users = \App\Models\User::all();

        return view("admin.dashboard", compact("users"));
    }
}
