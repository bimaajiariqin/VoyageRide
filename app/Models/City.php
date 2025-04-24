<?php


// app/Models/City.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;


    // Jika kamu ingin relasi ke Bus
    public function originBuses() {
        return $this->hasMany(Bus::class, 'origin_id');
    }

    public function destinationBuses() {
        return $this->hasMany(Bus::class, 'destination_id');
    }
}


