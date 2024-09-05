<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReviewType extends Model
{
    use HasFactory;

    protected $table = 'client_review_types';
    protected $primaryKey = 'crt_id';

    protected $fillable = [
        'crt_name',
        'crt_description',
        'crt_status',
    ];
}
