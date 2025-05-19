<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_id',
        'booking_number',
        'booking_date',
        'total_seats',
        'total_price',
        'tax_amount',
        'grand_total',
        'status',
        'payment_deadline',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
        'payment_deadline' => 'datetime',
    ];

    /**
     * Relasi dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Bus
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    /**
     * Relasi dengan Passenger
     */
    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }

    /**
     * Relasi dengan Payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Membuat nomor booking unik
     */
    public static function generateBookingNumber()
    {
        $prefix = 'VR-';
        $date = now()->format('Ymd');
        $randomNumber = mt_rand(1000, 9999);
        return $prefix . $date . '-' . $randomNumber;
    }
}