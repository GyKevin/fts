<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        // $users = \App\Models\User::all();

        return view("admin.dashboard");
    }

    public function users() {
        $users = \App\Models\User::all();

        return view("admin.users", compact("users"));
    }

    public function festivals() {
        $festivals = \App\Models\Festival::all();

        return view("admin.festivals", compact("festivals"));
    }

    public function busses() {
        $busses = \App\Models\Bus::all();
        $drivers = \App\Models\Driver::all();

        return view("admin.busses", compact("busses", "drivers"));
    }
}
