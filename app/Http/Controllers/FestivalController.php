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
        $user = Auth::user();
        $bus = Bus::findOrFail($request->bus_id);
        
        return view('festival.payment', [
            'festival' => $festival,
            'bus' => $bus,
            'user' => $user
        ]);
    }

    public function book(Request $request, Festival $festival) {
        $user = Auth::user();
        $bus = Bus::findOrFail($request->bus_id);
    
        $request->validate([
            'bus_id' => ['required', 'exists:buses,id'],
            'use_points' => ['nullable', 'boolean']
        ]);
    
        // Check seat availability
        if ($bus->available_seats <= 0) {
            return back()->with('error', 'This bus is fully booked');
        }
    
        $price = $bus->price;
        $pointsChange = 10;
        $usePoints = $request->boolean('use_points');
    
        if ($usePoints && $user->points >= 20) {
            $price = $bus->price * 0.85;
            $pointsChange = -20;
        }
    
        DB::transaction(function () use ($festival, $bus, $user, $price, $pointsChange) {
            // Calculate seats after this booking
            $takenSeats = $bus->total_seats - ($bus->available_seats - 1);
            $isConfirmed = $takenSeats >= 35;
    
            // Create the registration
            UserFestivalRegistration::create([
                'user_id' => $user->id,
                'festival_id' => $festival->id,
                'bus_id' => $bus->id,
                'status' => $isConfirmed ? 'confirmed' : 'pending'
            ]);
    
            // Create payment record
            Payment::create([
                'user_id' => $user->id,
                'festival_id' => $festival->id,
                'bus_id' => $bus->id,
                'amount' => $price,
                'status' => 'completed',
                'payment_method' => 'card'
            ]);
    
            // Update bus seats and status
            $bus->decrement('available_seats');
            
            if ($isConfirmed) {
                $bus->update(['status' => 'confirmed']);
                
                // Update all pending registrations for this bus
                UserFestivalRegistration::where('bus_id', $bus->id)
                    ->where('status', 'pending')
                    ->update(['status' => 'confirmed']);
            }
    
            // Update user points
            $user->increment('points', $pointsChange);
        });
    
        return redirect()->route('festival.show', $festival)
            ->with('success', 'Booking successful! Status: ' . 
                  ($bus->fresh()->available_seats <= ($bus->total_seats - 35) ? 'Confirmed' : 'Pending'));
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
