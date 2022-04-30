<?php

namespace App\Http\Controllers;

use App\Dto\OrderDto;
use App\Http\Controllers\BaseController;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrdersResource;
use App\Models\Order;
use App\Service\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrders()
    {
        $data = OrdersResource::collection($this->orderService->getAllOrders());
        return $this->sendResponse($data, 'Список заказов получен');
    }

    public function addOrder(OrderRequest $request)
    {
        $this->orderService->createOrder($request->getDto());
        return $this->sendResponse(false, 'Заказ успешно добавлен');
    }

    public function editOrder(OrderRequest $request, $id)
    {
        try {
            $this->orderService->updateOrder($id, $request->getDto());
            return $this->sendResponse(false, 'Заказ успешно отредактирован');
        } catch(\Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function showOrder($id)
    {
        try {
            $order = new OrdersResource($this->orderService->showOrder($id));
            return $this->sendResponse($order, 'Заказ успешно получен');
        } catch(\Throwable $e) {
            return $this->sendResponse(false, $e->getMessage());
        }

    }




}
