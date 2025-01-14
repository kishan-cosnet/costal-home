<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'service_description',
        'service_status',
    ];

    protected $casts = [
        'service_status' => 'boolean',
    ];

    public $timestamps = true;
}
