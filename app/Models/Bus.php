<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model {
    // protected $table = 'busses';
    
    protected $fillable = [
        'bus_number', 'festival_id', 'driver_id', 'date', 'location',
        'departure_time', 'arrival_time', 'total_seats', 
        'available_seats', 'price', 'status'
    ];

    public function festival() {
        return $this->belongsTo(Festival::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function registrations() {
        return $this->hasMany(UserFestivalRegistration::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function getTakenSeatsAttribute()
    {
        return $this->total_seats - $this->available_seats;
    }

    public function shouldBeConfirmed()
    {
        return $this->taken_seats >= 35;
    }

    public function updateStatus()
    {
        $newStatus = $this->shouldBeConfirmed() ? 'confirmed' : 'pending';
        $this->update(['status' => $newStatus]);
        return $this;
    }
}
