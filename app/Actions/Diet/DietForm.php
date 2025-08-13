<?php

namespace App\Actions\Diet;

use App\Models\DietPlan;
use Illuminate\Routing\Router;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class DietForm
{
    use AsAction;

    protected $dietPlan;

    public function handle(?int $id)
    {
        if ($id) {
            $this->dietPlan = DietPlan::findOrFail($id);
        } else {
            $this->dietPlan = new DietPlan();
        }
    }

    public function asController(?int $id = null)
    {
        // If an ID is provided, fetch the existing diet plan; otherwise, create a new instance


        // Pass the diet plan to the handle method
        $this->handle($id);
    }

    public function htmlResponse()
    {
        // Return an HTML response, e.g., a view or redirect
        return Inertia::render('Admin/Diet/Form', [
            // Pass any necessary data to the view
            'dietPlan' => $this->dietPlan,
        ]);
    }

    public static function routes(Router $router)
    {
        // Define the route for this action
        $router->get('admin/diet-plans/form/{id?}', static::class)
            ->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->name('admin.diet-plans.form');
    }
}
