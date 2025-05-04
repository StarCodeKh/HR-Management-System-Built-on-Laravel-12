<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveInformation extends Model
{
    use HasFactory;
    protected $table = 'leave_information'; // Specify the table name if it's not pluralized
}
