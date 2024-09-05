<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFinishReason extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'contract_finish_reasons';

    // The primary key associated with the table
    protected $primaryKey = 'reason_id';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'reason_name',
        'reason_description',
    ];

    // The attributes that should be mutated to dates.
    protected $dates = ['created_at', 'updated_at'];
}
