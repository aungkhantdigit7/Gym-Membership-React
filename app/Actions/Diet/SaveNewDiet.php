<?php

namespace App\Actions\Diet;

use App\Data\DietPlanData;
use App\Models\DietPlan;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveNewDiet
{
    use AsAction;

    public function handle(DietPlanData $data)
    {
        // ...
        DietPlan::create($data->toArray());
    }

    public function asController(DietPlanData $data)
    {
        return $this->handle($data);
    } 
    
    public static function routes(Router $router)
    {
        // Define the route for this action
        $router->post('admin/diet-plans', static::class)
            ->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->name('admin.diet-plans.store');
    }

    public function htmlResponse()
    {
        // Return a response suitable for HTML requests
        return redirect()->back()
            ->with('success', 'Diet plan saved successfully.');
    }
}
