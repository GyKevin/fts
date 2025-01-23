<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model {

    use HasFactory;
    protected $fillable = [
        'festival_name', 'date', 'location', 
        'description', 'max_participants', 'registration_deadline'
    ];

    public function busses() {
        return $this->hasMany(Bus::class);
    }

    public function registrations() {
        return $this->hasMany(UserFestivalRegistration::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}

