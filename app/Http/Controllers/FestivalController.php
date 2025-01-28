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

    public function book (request $request, Festival $festival) {
        $user = Auth::user();

        $bus = Bus::findOrFail($request->bus_id);
    
        $request->validate([
            'bus_id' => ['required', 'exists:buses,id'],
            'points' => ['nullable', 'boolean']
        ]);

        // Check if the user has enough points to use
        $price = $bus->price;
        $usePoints = $request->has('use_points') && $request->use_points == 1;

        if ($usePoints && $user->points >= 20) {
            $price = $bus->price*0.85;
        }

        DB::transaction(function () use ($festival, $bus, $request, $user, $price, $usePoints) {
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
                'amount' => $price,
                'status' => 'completed',
                'payment_method' => 'card'
            ]);
    
            // Update available seats
            $bus->decrement('available_seats');

            // give the user 10 points
            $user->increment('points', 10);

            if( $usePoints && $user->points >= 20) {
                $user->decrement('points', 20);
            }
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
