<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'order_id'      => $this->id,
            'phone'         => $this->phone,
            'fio'           => $this->fio,
            'address'       => $this->address,
            'sum'           => $this->sum,
            'created_at'    => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
