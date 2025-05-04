<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'purchase_from',
        'purchase_date',
        'purchased_by',
        'amount',
        'paid_by',
        'status',
        'attachments',
    ];
}
