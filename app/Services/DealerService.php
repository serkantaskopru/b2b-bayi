<?php

namespace App\Services;

use App\Interfaces\DealerRepositoryInterface;
use App\Models\Dealer;
use App\Models\User;

class DealerService implements DealerRepositoryInterface
{
    public function getAllDealers(): \Illuminate\Database\Eloquent\Collection
    {
        return Dealer::with('group')->get();
    }

    public function getDealerById($id)
    {
        return Dealer::findOrFail($id);
    }

    public function deleteDealer($id): void
    {
        Dealer::destroy($id);
    }

    public function createDealer($data)
    {
        $user = new User();
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $data['user_id'] = $user->id;

        return Dealer::create($data);
    }

    public function updateDealer($id, $data)
    {
        $dealer = Dealer::findOrFail($id);
        $dealer->update($data);
        return $dealer;
    }
}
