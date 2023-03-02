<?php

namespace App\Services;

interface InvoicesInterface
{
    public function create($data): void;
}