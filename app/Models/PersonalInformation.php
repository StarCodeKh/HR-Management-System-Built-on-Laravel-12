<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'passport_no',
        'passport_expiry_date',
        'tel',
        'nationality',
        'religion',
        'marital_status',
        'employment_of_spouse',
        'children',
    ];
}
