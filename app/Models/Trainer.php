<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerFactory> */
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'phone',
        'bio',
        'specialization',
    ];
}
