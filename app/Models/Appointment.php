<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'doctor',
        'date',
        'message',
        'status',
        'user_id',
    ];
}
