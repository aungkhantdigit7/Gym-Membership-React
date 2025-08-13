<?php

namespace App\Actions;

use App\Models\Trainer;
use Illuminate\Routing\Router;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\QueryBuilder;

class TrainerList
{
    use AsAction;
    protected $trainers = null;
    public function handle(int $per_page = 10)
    {
        $this->trainers = QueryBuilder::for(Trainer::class)
            ->allowedFilters(['name', 'email', 'specialization'])
            ->allowedSorts(['name', 'email', 'created_at'])
            // ->defaultSort('created_at')
            ->paginate($per_page);
        return $this->trainers;
    }

    public function asController()
    {
        $per_page = request()->input('per_page', 10);
        return $this->handle($per_page);
    }

    public static function routes(Router $router)
    {
        $router->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->get('admin/trainers', static::class)
            ->name('admin.trainers.list');
    }

    public function htmlResponse()
    {
        // dd($this->trainers);
        return Inertia::render('Admin/Trainers/List', [
            'trainers' => $this->trainers,
        ]);
    }
}
