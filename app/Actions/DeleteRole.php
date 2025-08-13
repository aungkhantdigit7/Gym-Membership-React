<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;

class DeleteRole
{
    use AsAction;

    public function handle(int|Role $role)
    {
        // ...
        // dd('DeleteRole action executed for ID: ' . $role);
        if ($role instanceof Role) {
            $role = $role->id; // Get the ID if a Role instance is passed
        }
        Role::findOrFail($role)->delete();
    }

    public function asController(int $id)
    {
        return $this->handle($id);
    }
    public function authorize(): bool
    {
        return true; // Adjust authorization logic as needed
    }
    public function htmlResponse()
    {
        return redirect()->route('admin.roles.lists')->with('success', 'Role deleted successfully.');
    }
}
