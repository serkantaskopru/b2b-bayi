<?php

namespace App\Interfaces;

interface DealerRepositoryInterface
{
    public function getAllDealers();
    public function getDealerById(int $id);
    public function deleteDealer(int $id);
    public function createDealer(array $data);
    public function updateDealer(int $id, array $data);
}
