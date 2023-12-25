<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'gender',
        'email',
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
