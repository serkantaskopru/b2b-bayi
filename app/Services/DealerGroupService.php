<?php

namespace App\Services;

use App\Interfaces\DealerGroupRepositoryInterface;
use App\Models\DealerGroup;

class DealerGroupService implements DealerGroupRepositoryInterface
{
    public function getAllDealerGroups(): \Illuminate\Database\Eloquent\Collection
    {
        return DealerGroup::all();
    }

    public function getDealerGroupById($id)
    {
        return DealerGroup::findOrFail($id);
    }

    public function deleteDealerGroup($id): void
    {
        DealerGroup::destroy($id);
    }

    public function createDealerGroup($data)
    {
        return DealerGroup::create($data);
    }

    public function updateDealerGroup($id, $data)
    {
        $dealerGroup = DealerGroup::findOrFail($id);
        $dealerGroup->update($data);
        return $dealerGroup;
    }
}
