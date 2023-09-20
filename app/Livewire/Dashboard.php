<?php

namespace App\Livewire;

use App\Charts\SalesLineChart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    protected $layout = 'layouts.app';
    private $firstRun = true;
    private $showDataLabels = true;


    private function getTodayOrders() {
        return Order::with(['payment', 'order_items', 'customer'])->today()->get();
    }

    private function getTodayRevenue() {
        return Order::with(['payment', 'order_items', 'customer', 'status'])
        ->today()
        ->where('status_id', Status::received()->first()->id)
        ->get()
        ->sum('total_amount');
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
        return DB::select(
            "SELECT p.id, p.name, SUM(c.quantity) AS quantity FROM products p
            left join cart_items c ON c.product_id = p.id
            left join orders o ON o.id = c.order_id
            left join status s ON s.id = o.status_id
            WHERE c.order_id IS NOT NULL and s.name = 'received'
            GROUP BY p.id;"
        );
    }

    private function getOrderByStatus($status) {
        return Order::where('status_id', Status::where('name', $status)->first()->id)
        ->get()
        ->count() ?? 0;
    }

    private function getSalesByMonth() {
        return DB::select(
            "SELECT
                DATE_FORMAT(`date`, '%b %Y') AS date,
                SUM(total_amount) AS total_sales
            FROM
                `orders`
                LEFT JOIN status ON status.id = `orders`.status_id
            WHERE
                YEAR(`date`) = YEAR(CURRENT_TIMESTAMP())  -- Replace 2023 with the desired year
                AND status.name = 'received'
            GROUP BY
                YEAR(`date`),
                MONTH(`date`),
                DATE_FORMAT(`date`, '%b %Y')
            ORDER BY
                YEAR(`date`),
                MONTH(`date`);
            "
        );
    }

    private function generateTwelveMonthsLabels() {
        $currentDate = Carbon::now();

        // Create an array to store the month labels
        $monthLabels = [];

        // Loop through the next 12 months
        for ($i = 0; $i < 12; $i++) {
            // Format the current date to get the month label (e.g., "September 2023")
            $monthLabel = $currentDate->format('F Y');
            
            // Add the month label to the array
            $monthLabels[] = $monthLabel;
            
            // Move to the next month
            $currentDate->addMonth();
        }

        // Print the generated month labels
        foreach ($monthLabels as $label) {
            echo $label . "\n";
        }
    }

    private function getSalesChart() {
        $salesByMonth = collect($this->getSalesByMonth());

        $chart = (object) [
            'labels' => $salesByMonth->pluck('date')->values()->all(),
            'dataset' => [[
                'label' => 'Sales Per Month ' . now()->format('Y'),
                'data' => $salesByMonth->pluck('total_sales')->values()->all(),
                'fill' => false,
                'borderColor' => 'rgb(75, 192, 192)',
                'tension' => 0.1
            ]]
        ];

        return $chart;
    }
    
    public function render()
    {
        $data = (object) [
            'totalTodayOrder' => $this->getTotalTodayOrders(),
            'totalTodayOrderRevenue' => $this->getTodayRevenue(),
            'outOfStockProducts' => $this->getTotalOutOfStockProducts(),
            'totalProduct' => $this->getTotalProduct(),
            'recentOrders' => $this->getRecentOrders(),
            'popularProducts' => $this->getPopularProducts(),
            'verifyingOrder' => $this->getOrderByStatus('verifying'),
            'packingOrder' => $this->getOrderByStatus('packing'),
            'deliveringOrder' => $this->getOrderByStatus('delivering'),
            'receivedOrder' => $this->getOrderByStatus('received'),
            'chart' => $this->getSalesChart()
        ];

        return view('livewire.dashboard',  [
            'data' => $data
        ]);
    }
}
