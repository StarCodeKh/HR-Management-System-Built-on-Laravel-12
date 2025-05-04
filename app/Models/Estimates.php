<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimates extends Model
{
    use HasFactory;

    protected $fillable = [
        'estimate_number',
        'client',
        'project',
        'email',
        'tax',
        'client_address',
        'billing_address',
        'estimate_date',
        'expiry_date',
        'total',
        'tax_1',
        'discount',
        'grand_total',
        'other_information',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $getUser = self::orderBy('estimate_number', 'desc')->first();

            if ($getUser) {
                $latestID = intval(substr($getUser->user_id, 4));
                $nextID = $latestID + 1;
            } else {
                $nextID = 1;
            }
            $model->estimate_number = 'EST_' . sprintf("%04s", $nextID);
            while (self::where('estimate_number', $model->estimate_number)->exists()) {
                $nextID++;
                $model->estimate_number = 'EST_' . sprintf("%04s", $nextID);
            }
        });
    }
}
