<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'name',
        'nik',
        'seat_number',
    ];

    /**
     * Mendapatkan booking yang memiliki penumpang ini.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}