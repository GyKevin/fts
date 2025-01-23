<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFestivalRegistration extends Model {
    protected $fillable = [
        'user_id', 'festival_id', 'bus_id', 
        'registration_date', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function festival() {
        return $this->belongsTo(Festival::class);
    }

    public function bus() {
        return $this->belongsTo(Bus::class);
    }
}
