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
        $pointsUsed = 0;
        $usePoints = $request->boolean('use_points');
    
        if ($usePoints && $user->points >= 20) {
            $price = $bus->price * 0.85;
            $pointsUsed = 20; // Track points used
        }
    
        DB::transaction(function () use ($festival, $bus, $user, $price, $pointsUsed, $usePoints) {
            // Create the registration with points tracking
            $registration = UserFestivalRegistration::create([
                'user_id' => $user->id,
                'festival_id' => $festival->id,
                'bus_id' => $bus->id,
                'status' => 'pending',
                'points_used' => $pointsUsed,
                'used_points_discount' => $usePoints
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
    
            // Update bus seats
            $bus->decrement('available_seats');
    
            // Calculate dynamic threshold
            $threshold = $this->calculateConfirmationThreshold($bus);
    
            // Check if we've reached the threshold
            $takenSeats = $bus->total_seats - $bus->available_seats;
            if ($takenSeats >= $threshold) {
                $this->confirmBusAndRegistrations($bus);
            }
    
            // Update user points if they used any
            if ($pointsUsed > 0) {
                $user->decrement('points', $pointsUsed);
            } else {
                $user->increment('points', 10); // Standard points earning
            }
        });
    
        return redirect()->route('festival.show', $festival)
            ->with('success', 'Booking successful! Your status is pending confirmation.');
    }
    protected function calculateConfirmationThreshold(Bus $bus): int {
        // Count how many registrations used points
        $pointsRedemptions = UserFestivalRegistration::where('bus_id', $bus->id)
            ->where('used_points_discount', true)
            ->count();

        // Adjust threshold if 10+ students used points
        return ($pointsRedemptions >= 10) ? 40 : 35;
    }

    protected function confirmBusAndRegistrations(Bus $bus) {
        // Update bus status
        $bus->update(['status' => 'confirmed']);
        
        // Update all pending registrations
        UserFestivalRegistration::where('bus_id', $bus->id)
            ->where('status', 'pending')
            ->update(['status' => 'confirmed']);
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
