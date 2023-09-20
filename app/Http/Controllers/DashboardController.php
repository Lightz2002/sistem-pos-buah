<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    private function getTodayOrders() {
        return Order::with(['payment', 'order_items', 'customer'])->today()->get();
    }

    private function getTodayRevenue() {
        dd(Order::with(['payment', 'order_items', 'customer', 'status'])
        ->where('status', Status::received()->first()->id)
        ->today()
        ->get()
        ->sum('total_amount'));
        // return Order::with(['payment', 'order_items', 'customer', 'status'])
        // ->where('status', Status::received()->first()->id)
        // ->today()
        // ->get()
        // ->sum('total_amount');
    }

    private function getTotalTodayOrders() {
        return $this->getTodayOrders()->count();
    }

    private function getTotalOutOfStockProducts() {
        return Product::where('quantity', 0)->get()->count();
    }

    private function getTotalProduct() {
        return count(Product::all());
    }

    private function getRecentOrders() {
        return Order::with(['payment', 'order_items', 'customer'])
        ->orderByDesc('Date')
        ->limit(5)
        ->get();
    }

    private function getPopularProducts() {
        return DB::raw(
            "SELECT p.id, p.name, SUM(c.quantity) AS quantity FROM products p
            left join cart_items c ON c.product_id = p.id
            left join orders o ON o.id = c.order_id
            left join status s ON s.id = o.status_id
            WHERE c.order_id IS NOT NULL and s.name = 'received'
            GROUP BY p.id;"
        );
    }

    public function index()
    {
        $data = (object) [
            'totalTodayOrder' => $this->getTotalTodayOrders(),
            'totalTodayOrderRevenue' => 2,
            'outOfStockProducts' => $this->getTotalOutOfStockProducts(),
            'totalProduct' => $this->getTotalProduct(),
            'popularProducts' => $this->getPopularProducts(),
        ];

        dd($data);

        return view('dashboard', [
            'data' => $data
        ]);
    }
}
