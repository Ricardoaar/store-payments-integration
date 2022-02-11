<?php

namespace App\Factories\Payment\Interfaces;

interface IPayment
{

    public function createPayment(array $data);

    public function retryPayment();

    public function cancelPayment();

    public function checkPayStatus(string $requestId);
}
