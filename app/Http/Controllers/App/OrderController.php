<?php

namespace App\Http\Controllers\App;

use App\CargoFirm;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Order\CreateOrderRequest;
use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    protected OrderRepositoryInterface $orderService;
    public function __construct(OrderRepositoryInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function fetchOrdersByStatus(Request $request): JsonResponse
    {
        $orders = $this->orderService->fetchOrdersByStatus($request->input('status'))->toArray();
        $orders = array_map(function($order) {
            $order['date'] = date('d.m.Y H:i',strtotime($order['created_at']));
            $order['cargo_firm'] = match ($order['cargo_firm']){
                0 => 'Yurtiçi Kargo',
                1 => 'Ptt Kargo',
            };
            $order['payment_method'] = match ($order['payment_method']){
                0 => 'Kapıda Ödeme',
                1 => 'Kredi Kartı',
                2 => 'Bayi Hesabına',
                3 => 'Firma Hesabına',
            };
            return $order;
        }, $orders);
        $data = [
            "draw" => 1,
            "recordsTotal" => count($orders),
            "recordsFiltered" => count($orders),
            "data" => $orders
        ];
        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function createOrder(CreateOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->validated());
        return Response::json(['code' => $order['code'], 'message' => $order['message']], $order['status'], [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = $this->orderService->getOrderById($id);
        return view('app.pages.order.show',['order' => $order]);
    }
}
