<?php

namespace App\Actions;

use App\Models\Trainer;
use Illuminate\Routing\Router;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class TrainerForm
{
    use AsAction;
    protected Trainer $trainer;

    public function handle(?int $id = null)
    {
        // ...
        if (!$id) {
            $this->trainer = new Trainer();
        } else {
            $this->trainer = Trainer::findorFail($id);
        }
    }
    public function asController(?int $id = null)
    {

        if ($id) {
            $this->handle($id);
        } else {
            $this->handle();
        }
    }

    public static function routes(Router $router)
    {
        $router->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->get('admin/trainers/form/{id?}', static::class)
            ->name('admin.trainer.form');
    }
    public function htmlResponse()
    {
        return Inertia::render('Admin/Trainers/TrainerForm', [
            'trainer' => $this->trainer
        ]);
    }
}
