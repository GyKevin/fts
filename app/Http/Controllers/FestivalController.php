<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use App\Models\UserFestivalRegistration;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bus;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $festivals = Festival::query()->orderBy('id', 'desc')->get();
        // dd($festivals);
        return view('festival.index', ['festivals'=> $festivals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        return view('festival.show', ['festival'=> $festival]);
    }

    public function myFestivals()
    {
        $user = Auth::user(); 

        
        $registrations = UserFestivalRegistration::with('festival')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('festival.myFestivals', [
            'registrations' => $registrations,
            'user'=> $user
        ]);
    }


    public function payment(Request $request, Festival $festival)
{
    $bus = Bus::findOrFail($request->bus_id);
    // $bus = new Bus;
    // dd($bus->get());
    
    return view('festival.payment', [
        'festival' => $festival,
        'bus' => $bus
    ]);
}

    public function book (request $request, Festival $festival) {
        $user = Auth::user();
    
        $request->validate([
            'bus_id' => ['required', 'exists:buses,id']
        ]);

        $bus = Bus::findOrFail($request->bus_id);

        // Create registration
        DB::transaction(function () use ($festival, $bus, $request, $user) {
            // Create registration
            UserFestivalRegistration::create([
                'user_id' => Auth::id(),
                'festival_id' => $festival->id,
                'bus_id' => $bus->id,
                'status' => 'confirmed'
            ]);
    
            // Create payment record
            Payment::create([
                'user_id' => Auth::id(),
                'festival_id' => $festival->id,
                'bus_id' => $bus->id,
                'amount' => $bus->price,
                'status' => 'completed',
                'payment_method' => 'card'
            ]);
    
            // Update available seats
            $bus->decrement('available_seats');

            // give the user 10 points
            $user->increment('points', 10);
        });
    
        return redirect()->route('festival.show', $festival)
            ->with('success', 'Your trip has been booked successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        //
    }
}
