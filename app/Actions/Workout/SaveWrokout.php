<?php

namespace App\Actions\Workout;

use App\Data\WorkoutClassData;
use App\Models\WorkoutClass;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveWrokout
{
    use AsAction;

    public function handle(WorkoutClassData $data)
    {
        // dd($data->toArray());
        $workout = WorkoutClass::create($data->toArray());
        if ($data->image) {
            $workout->addMedia($data->image)
                ->toMediaCollection('previews_image');
        }
    }
    public function asController(WorkoutClassData $data)
    {
        $this->handle($data);
    }

    public function htmlResponse()
    {
        return redirect()->route('admin.workout-classes.lists')->with('success', 'Workout class saved successfully.');
    }

    public static function routes(Router $router)
    {
        $router->post('admin/workout-classes', static::class)->name('admin.workout-classes.store');
    }
}
