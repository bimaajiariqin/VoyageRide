<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'bus_type',
        'seat_capacity',
        'bus_number',
        'model',
        'logo_url',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'price',
        'has_luggage',
        'has_light',
        'has_ac',
        'has_drink',
        'has_wifi',
        'has_usb',
        'has_cctv',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'has_luggage' => 'boolean',
        'has_light' => 'boolean',
        'has_ac' => 'boolean',
        'has_drink' => 'boolean',
        'has_wifi' => 'boolean',
        'has_usb' => 'boolean',
        'has_cctv' => 'boolean',
    ];

    
}
