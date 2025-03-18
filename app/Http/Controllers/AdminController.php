<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        // $users = \App\Models\User::all();

        return view("admin.dashboard");
    }

    //Users
    public function users() {
        $users = \App\Models\User::all();

        return view("admin.users", compact("users"));
    }
    public function editUser(\App\Models\User $user) {
        return view("admin.edit.users", compact("user"));
    }
    public function updateUser(\App\Models\User $user, Request $request) {
        $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|string",
            "age" => "required|integer",
            "password" => "required|string",
            "phone" => "required|string",
            "role" => "required|string",
            "student_number" => "required|string",
            "points" => "required|integer"
        ]);
        $user->update(request()->all());

        return redirect()->route("admin.users")->with("success", "User updated successfully");
    }
    public function deleteUser(\App\Models\User $user) {
        $user->delete();

        return redirect()->route("admin.users")->with("success", "User deleted successfully");
    }
    public function storeUser(Request $request) {
        $validateData = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|string",
            "age" => "nullable|integer",
            "password" => "required|string",
            "phone" => "nullable|string",
            "role" => "required|string",
            "student_number" => "required|string",
            "points" => "required|integer"
        ]);

        \App\Models\User::create($validateData);

        return redirect()->route("admin.users")->with("success", "User created successfully");
    }

    //Drivers
    public function drivers() {
        $drivers = \App\Models\Driver::all();

        return view("admin.drivers", compact("drivers"));
    }
    public function storeDriver(Request $request) {
        $validateData = $request->validate([
            "license_number" => "required|string",
            "license_expiry" => "required|date",
        ]);

        \App\Models\Driver::create($validateData);

        return redirect()->route("admin.drivers")->with("success", "Driver created successfully");
    }

    //Festivals
    public function festivals() {
        $festivals = \App\Models\Festival::all();

        return view("admin.festivals", compact("festivals"));
    }
    public function editFestival(\App\Models\Festival $festival) {
        return view("admin.edit.festivals", compact("festival"));
    }
    public function updateFestival(\App\Models\Festival $festival, Request $request) {
        $request->validate([
            "festival_name" => "required",
            "festival_location" => "required",
            "festival_date" => "required",
            "festival_capacity" => "required",
            "festival_description" => "required",
        ]);
        $festival->update(request()->all());

        return redirect()->route("admin.festivals")->with("success", "Festival updated successfully");
    }
    public function deleteFestival(\App\Models\Festival $festival) {
        $festival->delete();

        return redirect()->route("admin.festivals")->with("success", "Festival deleted successfully");
    }
    public function storeFestival(Request $request) {
        $validateData = $request->validate([
            "festival_name" => "required|string",
            "date" => "required|date",
            "location" => "required|string",
            "description" => "nullable|string",
            "max_participants" => "nullable|integer|min:1",
            "registration_deadline" => "nullable|date",
        ]);

        // dd($validateData);
        \App\Models\Festival::create($validateData);

        return redirect()->route("admin.festivals")->with("success", "Festival created successfully");
    }

    // busses
    public function busses() {
        $busses = \App\Models\Bus::all();
        $drivers = \App\Models\Driver::all();
        $festivals = \App\Models\Festival::all();

        return view("admin.busses", compact("busses", "drivers", "festivals"));
    }
    public function storeBus(Request $request) {
        $validateData = $request->validate([
            "bus_number" => "required|string",
            "festival_id" => "required|integer|exists:festivals,id",
            "driver_id" => "nullable|integer",
            "date" => "required|date",
            "location" => "required|string",
            "departure_time" => "required|date",
            "arrival_time" => "required|date",
            "total_seats" => "required|integer",
            "available_seats" => "required|integer",
            "price" => "required|numeric",
        ]);

        \App\Models\Bus::create($validateData);

        return redirect()->route("admin.busses")->with("success", "Bus created successfully");
    }
    public function addBus() {
        $festivals = \App\Models\Festival::all();
        $drivers = \App\Models\Driver::all();
    
        return view('admin.add.busses', compact('festivals', 'drivers'));
    }
}
