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
        $registrations = \App\Models\UserFestivalRegistration::all();

        return view("admin.users", compact("users", "registrations"));
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

    //User Festival Registration
    // Fetch all reservations for a specific user
    public function userRegistrations(\App\Models\User $user)
    {
        $registrations = $user->festivalRegistrations()
            ->with(['festival', 'bus.driver'])
            ->get();

        return view('admin.edit.registrations', compact('user', 'registrations'));
    }
    public function registrations() 
    {
        $users = \App\Models\User::all();
        $registrations = \App\Models\UserFestivalRegistration::all();
        return view("admin.registrations", compact("users", "registrations"));
    }
    public function editRegistration(\App\Models\UserFestivalRegistration $registration)
    {
        // Eager load all necessary relationships
        $registration->load([
            'user', // This loads the user relationship
            'festival', 
            'bus.driver'
        ]);
        
        // Use $registration->user instead of undefined $user
        return view('admin.edit.registrations', compact('registration'));
    }
    public function updateRegistration(\App\Models\UserFestivalRegistration $registration, Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'festival_id' => 'required|integer|exists:festivals,id',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);

        $registration->update([
            'user_id' => $request->user_id,
            'festival_id' => $request->festival_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.registrations')->with('success', 'Registration updated successfully');
    }
    public function deleteRegistration(\App\Models\UserFestivalRegistration $registration) {
        $registration->delete();

        return redirect()->route("admin.registrations")->with("success", "User Festival Registration deleted successfully");
    }

    //Drivers
    public function drivers() {
        $drivers = \App\Models\Driver::all();

        return view("admin.drivers", compact("drivers"));
    }
    public function editDriver(\App\Models\Driver $driver) {
        return view("admin.edit.drivers", compact("driver"));
    }
    public function updateDriver(\App\Models\Driver $driver, Request $request) {
        $request->validate([
            "license_number" => "required|string",
            "license_expiry" => "required|date",
        ]);
        $driver->update(request()->all());

        return redirect()->route("admin.drivers")->with("success", "Driver updated successfully");
    }
    public function deleteDriver(\App\Models\Driver $driver) {
        $driver->delete();

        return redirect()->route("admin.drivers")->with("success", "Driver deleted successfully");
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
            "location" => "required",
            "date" => "required",
            "max_participants" => "required",
            "description" => "required",
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
    public function editBus(\App\Models\Bus $bus) {
        $drivers = \App\Models\Driver::all();
        $festivals = \App\Models\Festival::all();

        return view("admin.edit.busses", compact("bus", "drivers", "festivals"));
    }
    public function updateBus(\App\Models\Bus $bus, Request $request) {
        $request->validate([
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
        $bus->update(request()->all());

        return redirect()->route("admin.busses")->with("success", "Bus updated successfully");
    }
    public function deleteBus(\App\Models\Bus $bus) {
        $bus->delete();

        return redirect()->route("admin.busses")->with("success", "Bus deleted successfully");
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
