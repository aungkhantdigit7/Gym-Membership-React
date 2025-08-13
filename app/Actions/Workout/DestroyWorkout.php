<?php

namespace App\Actions\Workout;

use App\Models\WorkoutClass;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyWorkout
{
    use AsAction;

    public function handle(int $id): void
    {
        // Find the workout class by ID
        $workoutClass = WorkoutClass::findOrFail($id);

        // Delete the workout class
        $workoutClass->delete();
    }

    public function asController(int $id)
    {
        // Validate the ID or any other parameters if necessary
        // Call the handle method to perform the action
        $this->handle($id);
    }

    // public static function routes(Router $router)
    // {
    //     $router->delete('admin/workout-classes/{id}', static::class)->name('admin.workout-classes.destroy');
    // }

    public function htmlResponse()
    {
        return redirect()->route('admin.workout-classes.lists')
            ->with('success', 'Workout class deleted successfully.');
    }
}
