<?php

namespace App\Interfaces;

interface DealerGroupRepositoryInterface
{
    public function getAllDealerGroups();
    public function getDealerGroupById(int $id);
    public function deleteDealerGroup(int $id);
    public function createDealerGroup(array $data);
    public function updateDealerGroup(int $id, array $data);
}
