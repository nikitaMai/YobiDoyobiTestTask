<?php

namespace App\Service;

use App\Dto\OrderDto;
use App\Models\Order;

class OrderService
{

    public function getAllOrders()
    {
        $orders = Order::orderBy('created_at', 'ASC')->get();
        return $orders;
    }

    public function createOrder(OrderDto $request)
    {
        $order = new Order();
        $this->setDataOrder($request, $order);
        return true;
    }

    public function updateOrder($id, OrderDto $request)
    {
        $order = Order::find($id);
        if(!$order)
        {
            throw new \Exception("Такого заказа не существует");
        }
        $this->setDataOrder($request, $order);
        return true;
    }

    public function showOrder($id)
    {
        $order = Order::find($id);
        if(!$order)
        {
            throw new \Exception("Такого заказа не существует");
        }
        return $order;
    }

    public function setDataOrder($request, $order): void
    {
        $order->phone = $request->getPhone();
        $order->fio = $request->getFio();
        $order->address = $request->getAddress();
        $order->sum = $request->getSum();
        $order->save();
    }

}
