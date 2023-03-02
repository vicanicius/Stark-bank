<?php

namespace App\Infra\Services;

use App\Services\InvoicesInterface;
use StarkBank\Invoice;
use App\Utils\Starkbank as UtilStarkbank;

class Invoices implements InvoicesInterface
{
    public function __construct()
    {
        (new UtilStarkbank)->setUser();
    }

    public function create($data): void
    {
        Invoice::create($data);
    }
}