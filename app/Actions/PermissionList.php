<?php

namespace App\Actions;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;

class PermissionList
{
    use AsAction;

    protected $permissions = [];
    public function handle()
    {
        // ...
        $this->permissions = Permission::all()->map(function ($permission) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
            ];
        })->toArray();

        return $this->permissions;
    }
    public function asController()
    {
        return $this->handle();
    }
    public function htmlResponse()
    {
        // dd('htmlResponse', $this->permissions);
        return Inertia::render('Admin/Permissions/index', [
            'permissions' => $this->permissions
        ]);
    }
}
