<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'customer_id',
        'city_id',
        'date_s',
        'date_e',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function city() {
        return $this->belongsTo(City::class);
    }
    public function company() {
        return $this->belongsTo(Company::class);
    }
    public function booking() {
        return $this->hasOne(Booking::class,'id','ticket_id');
    }
}
