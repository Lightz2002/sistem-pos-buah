<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function changeStatus(Order $order) {
        $order->status_id = Status::where('name', request()->status)->first()->id;
        $order->save();

        $message = 'Order status changed to ' . request()->status;

        if (request()->status === 'packing') {
            foreach ($order->order_items as $item) {
                $item->product->quantity -= $item->quantity;
                $item->product->sold_quantity += $item->quantity;
                $item->product->save();
            }
        }

        session()->flash($message);

        return response()->json([
            'message' => $message
        ]);
    }
}
