<?php

namespace App\Actions;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class RoleList
{
    use AsAction;
    protected ViewModel $viewModel;

    public function handle(int $perPage = 10): void
    {
        // Fetch roles with pagination
        // $this->roles = Role::query()->paginate($perPage);
        $this->viewModel = new \App\ViewModels\RolesViewModel($perPage);
    }
    public function asController()
    {
        $perPage = (int) request()->input('per_page', 10);

        $this->handle($perPage);
    }
    public function htmlResponse()
    {
        // dd($this->viewModel->toArray());
        return Inertia::render('Roles/List', $this->viewModel->toArray());
    }
}
