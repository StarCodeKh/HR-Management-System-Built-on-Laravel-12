<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'department',
        'job_location',
        'no_of_vacancies',
        'experience',
        'age',
        'salary_from',
        'salary_to',
        'job_type',
        'status',
        'start_date',
        'expired_date',
        'description',
    ];
}
