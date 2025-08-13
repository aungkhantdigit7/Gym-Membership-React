<?php

namespace App\Actions\Diet;

use App\Models\DietPlan;
use App\Data\DietPlanData;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateDietPlan
{
    use AsAction;

    public function handle(int $id, DietPlanData $data): DietPlan
    {
        $dietPlan = DietPlan::findOrFail($id);

        $dietPlan->update($data->toArray());

        return $dietPlan->fresh();
    }

    public function asController(int $id, DietPlanData $data): DietPlan
    {
        return $this->handle($id, $data);
    }

    public static function routes(\Illuminate\Routing\Router $router)
    {
        $router->middleware(['web', 'auth'])
            ->put('admin/diet-plans/{id}', static::class)
            ->name('admin.diet-plans.update');
    }
    public function htmlResponse(DietPlan $dietPlan): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('admin.diet-plans.list')
            ->with('success', 'Diet plan updated successfully.')
            ->with('dietPlan', $dietPlan);
    }
}
