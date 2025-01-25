<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Models\Order;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function changeStatus(Order $order)
    {
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

    public function getOrderItem(Order $order)
    {
        $orderItems = CartItems::with(['product'])->where('order_id', $order->id)->get();
        return response()->json([
            'orderItems' => $orderItems
        ]);
    }

    public function updateReturnQuantity(Order $order)
    {
        try {
            $returnedProducts = request()->all();

            DB::transaction(function () use ($returnedProducts, $order) {
                // loop smua productnya
                // update returned_quantity order item yg idnya sesuai product 

                if (count($returnedProducts) == 0) throw new Exception('No Return Product Selected !');

                foreach ($returnedProducts as $returnedProduct) {
                    $cart_items =  CartItems::with(['product'])->where('id', $returnedProduct['id'])->first();

                    if (!$cart_items) throw new Exception("Order with id {$returnedProduct['id']} is not found !");

                    if ($cart_items->quantity < $returnedProduct['value']) throw new Exception("{$cart_items->product->name} - {$cart_items->product->size} Quantity Is Smaller Than Return quantity !");

                    $updatedData = [
                        'returned_quantity' => $returnedProduct['value'],
                        'quantity' => $cart_items->quantity - $returnedProduct['value'],
                    ];

                    $cart_items->update($updatedData);
                }

                $order->status_id = Status::returned()->first()->id;
                $order->save();
            });


            return response()->json([
                'message' => 'Products Successfully Returned',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => Response::HTTP_BAD_REQUEST
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
