<?php

namespace App\Services;

use App\Interfaces\PersonnelRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Throwable;

class PersonnelService implements PersonnelRepositoryInterface
{
    public function getAllPersonnels(): \Illuminate\Database\Eloquent\Collection
    {
        return User::role('Personel')->get();
    }

    public function getPersonnelById($id)
    {
        return User::role('Personel')->findOrFail($id);
    }

    public function deletePersonnel($id): void
    {
        User::destroy($id);
    }

    /**
     * @throws Throwable
     */
    public function createPersonnel($data)
    {
        $db = DB::connection('tenant');
        $db->beginTransaction();
        try{
            $role = Role::where('name', 'Personel')->first();
            $user = User::create($data);
            $user->assignRole($role);
            $db->commit();
            return $user;
        }catch (\Exception $exception){
            $db->rollBack();
        }
        return null;
    }

    public function updatePersonnel($id, $data)
    {
        $personnel = User::findOrFail($id);
        $personnel->update($data);
        return $personnel;
    }
}
