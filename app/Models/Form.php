<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'name',
    'email',
    'sex',
    'country',
    'phone',
    'facebook_name',
    'youtube_name'
   ];
}
