<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\OrderStatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected OrderRepositoryInterface $orderService;
    public function __construct(OrderRepositoryInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order_status = $request->input('status',0);
        $order_statuses = array_column(OrderStatus::cases(), 'value');
        $order_counts = array_map(fn($status) => Order::where('status', $status)->count(), $order_statuses);
        return view('app.pages.dashboard', [
            'order_status' => $order_status,
            'order_counts' => $order_counts,
        ]);
    }
}
