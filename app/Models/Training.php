<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'trainer_id',
        'employees_id',
        'training_type',
        'trainer',
        'employees',
        'training_cost',
        'start_date',
        'end_date',
        'description',
        'status',
        '_token',
    ];
}
