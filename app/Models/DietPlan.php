<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    /** @use HasFactory<\Database\Factories\DietPlanFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'plan', // Assuming food_type is a string representing a type
        'duration', // Duration in days
    ];
}
