<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_name',
        'bank_account_no',
        'ifsc_code',
        'pan_no',
    ];
}
