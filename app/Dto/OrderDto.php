<?php

namespace App\Dto;

class OrderDto
{

    private $phone;
    private $fio;
    private $address;
    private $sum;

    /**
     * @param $phone
     * @param $fio
     * @param $address
     * @param $sum
     */
    public function __construct(string $phone, string $fio, string $address, float $sum)
    {
        $this->phone = $phone;
        $this->fio = $fio;
        $this->address = $address;
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }



}
