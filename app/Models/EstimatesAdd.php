<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatesAdd extends Model
{
    use HasFactory;
    protected $fillable = [
        'estimate_number',
        'item',
        'description',
        'unit_cost',
        'qty',
        'amount',
    ];
}
