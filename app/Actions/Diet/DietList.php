<?php

namespace App\Actions\Diet;

use App\Models\DietPlan;
use Illuminate\Routing\Router;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\QueryBuilder;

class DietList
{
    use AsAction;
    protected $data;
    public function handle()
    {
        $this->data = QueryBuilder::for(DietPlan::class)
            ->allowedFilters(['name', 'plan'])
            ->allowedSorts(['name', 'created_at'])
            ->paginate(10)
            ->withQueryString();
    }

    public function asController()
    {
        return $this->handle();
    }

    public static function routes(Router $router)
    {
        $router->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->get('admin/diet-plans', static::class)
            ->name('admin.diet-plans.list');
    }

    public function htmlResponse()
    {
        return Inertia::render('Admin/Diet/List', [
            'dietPlans' => $this->data,
        ]);
    }
}
