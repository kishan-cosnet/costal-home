<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCancellationType extends Model
{
    use HasFactory;

    protected $table = 'booking_cancellation_types';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_name',
        'booking_description',
        'booking_status',
    ];
}
