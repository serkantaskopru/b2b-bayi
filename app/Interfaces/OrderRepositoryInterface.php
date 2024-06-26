<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function fetchOrdersByStatus(int $status): Collection;
    public function createOrder(array $data): array;
    public function getOrderById(int $id);
}
