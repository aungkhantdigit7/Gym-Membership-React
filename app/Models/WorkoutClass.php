<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WorkoutClass extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\WorkoutClassFactory> */
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'class_fee',
        'duration',
        'intensity',
        'complexity',
    ];
    public function registerMediaCollections(): void
    {
        

        $this->addMediaCollection('previews_image')
            ->useDisk('public')
            ->singleFile(); 
    }
}
