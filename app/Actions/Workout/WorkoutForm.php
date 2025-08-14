<?php

namespace App\Actions\Workout;

use App\Models\WorkoutClass;
use Illuminate\Routing\Router;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class WorkoutForm
{
    use AsAction;

    protected WorkoutClass $workoutclass;

    public function handle(?int $id = null)
    {
        // If an ID is provided, fetch the existing workout class; otherwise, create a new instance
        if ($id) {
            $this->workoutclass = WorkoutClass::findOrFail($id);
        } else {
            $this->workoutclass = new WorkoutClass();
        }
    }
    
    public function asController(?int $id = null)
    {
        if ($id) {
            $this->workoutclass = WorkoutClass::findOrFail($id);
        } else {
            $this->workoutclass = new WorkoutClass();
        }
        $this->handle($id);
    }

    public static function routes(Router $router)
    {
        $router->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->get('admin/workout-class/form/{id?}', static::class)
            ->name('admin.workout-class.form');
    }

    public function htmlResponse()
    {
        return Inertia::render('Admin/workout/Form', [
            'workoutclass' => $this->workoutclass,
        ]);
    }
}
