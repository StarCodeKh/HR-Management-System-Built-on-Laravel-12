<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'salary',
        'basic',
        'da',
        'hra',
        'conveyance',
        'allowance',
        'medical_allowance',
        'tds',
        'esi',
        'pf',
        'leave',
        'prof_tax',
        'labour_welfare',
    ];
}
