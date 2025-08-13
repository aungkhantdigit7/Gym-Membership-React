<?php

namespace App\Actions;

use App\Models\WorkoutClass;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\QueryBuilder;

class WorkoutClassList
{
    use AsAction;
    protected $data;

    public function handle(?int $perPage = 10)
    {
        // ...

        $this->data = QueryBuilder::for(WorkoutClass::class)
            ->allowedFilters(['name', 'type'])
            ->allowedSorts(['name', 'created_at'])
            ->with('media')
            ->paginate($perPage)
            ->withQueryString();
        return $this->data;
    }

    public function asController()
    {
        $perPage = request()->input('per_page', 10);
        return $this->handle($perPage);
    }

    public function htmlResponse()
    {
        $data = $this->handle();

        return Inertia::render('Admin/workout/List', [
            'classes' => $data,
        ]);
    }
}
