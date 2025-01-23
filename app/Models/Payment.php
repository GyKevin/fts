<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $fillable = [
        'user_id', 'festival_id', 'bus_id', 
        'amount', 'payment_date', 'status', 'payment_method'
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
