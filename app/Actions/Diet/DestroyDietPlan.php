<?php

namespace App\Actions\Diet;

use App\Models\DietPlan;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyDietPlan
{
    use AsAction;

    public function handle(int $id): bool
    {
        $dietPlan = DietPlan::findOrFail($id);

        return $dietPlan->delete();
    }
    public function asController(int $id): bool
    {
        return $this->handle($id);
    }

    public static function routes(\Illuminate\Routing\Router $router)
    {
        $router->middleware(['web', 'auth'])
            ->delete('admin/diet-plans/{id}', static::class)
            ->name('admin.diet-plans.destroy');
    }

    public function htmlResponse(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('admin.diet-plans.list')->with('success', 'Diet plan deleted successfully.');
    }
}
