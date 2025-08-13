<?php

namespace App\Actions;

use App\Data\RoleData;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class SaveNewRole
{
    use AsAction;

    public function handle(RoleData $data): Role
    {
        $role = new Role();
        $role->name = request('name');
        $role->guard_name = 'web';
        $role->save();

        return $role;
    }

    public function asController(RoleData $data)
    {
        $data = RoleData::from(request()->all());

        $role = $this->handle($data);
    }

    public function htmlResponse()
    {
        return redirect()->route('admin.roles.lists')->with('success', 'Role created successfully.');
    }
}
