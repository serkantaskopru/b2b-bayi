<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Order\CreateOrderRequest;
use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    protected OrderRepositoryInterface $orderService;
    public function __construct(OrderRepositoryInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function createOrder(CreateOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->validated());
        return Response::json(['code' => $order['code'], 'message' => $order['message']], $order['status'], [], JSON_UNESCAPED_UNICODE);
    }
}
