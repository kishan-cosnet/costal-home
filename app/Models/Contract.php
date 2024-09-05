<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $primaryKey = 'contract_id';

    protected $fillable = [
        'contract_name',
        'description',
        'status',
    ];

    public $timestamps = true;
}
