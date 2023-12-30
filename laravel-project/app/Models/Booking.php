<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'customer_id',
        'hotel_id',
        'book_date',
    ];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
}
