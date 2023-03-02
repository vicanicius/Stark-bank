<?php

namespace App\Http\Controllers;

use App\UseCases\InvoiceUseCase;

class InvoiceController extends Controller
{

    public function __construct(
        protected InvoiceUseCase $invoiceUseCase
    ) {
        $this->invoiceUseCase = $invoiceUseCase;
    }

    public function create()
    {
        $this->invoiceUseCase->execute();
    }
}
