<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $table = 'leave_types';
    protected $primaryKey = 'lt_id';

    protected $fillable = [
        'lt_name',
        'lt_description',
        'status',
    ];
}
