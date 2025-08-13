<?php

namespace App\Actions\Workout;

use App\Actions\WorkoutClassList;
use App\Data\WorkoutClassData;
use App\Models\WorkoutClass;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateWorkout
{
    use AsAction;

    public function handle(int $id, array $data): void
    {
        // Find the workout class by ID
        $workoutClass = WorkoutClass::findOrFail($id);

        // Update the workout class with the provided data
        $workoutClass->update($data);
    }

    public function asController(int $id, WorkoutClassData $data)
    {
        // Validate the ID or any other parameters if necessary
        // Call the handle method to perform the action
        return $this->handle($id, $data->toArray());
    }

    public function htmlResponse()
    {
        // Call the handle method to perform the action

        // Redirect to the workout class list after updating
        return redirect()->route('admin.workout-classes.lists')->with('success', 'Workout class updated successfully.');
    }

   
    
}
