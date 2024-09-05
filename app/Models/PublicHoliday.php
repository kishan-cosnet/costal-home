<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    use HasFactory;

    protected $table = 'public_holidays';
    protected $primaryKey = 'hld_id';

    protected $fillable = [
        'hld_name',
        'hld_date',
        'hld_description'
    ];
}
