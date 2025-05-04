<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmergencyContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_primary',
        'relationship_primary',
        'phone_primary',
        'phone_2_primary',
        'name_secondary',
        'relationship_secondary',
        'phone_secondary',
        'phone_2_secondary',
    ];
}
