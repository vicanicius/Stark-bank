<?php

namespace App\Services;

interface WebhookInterface
{
    public function execute($data): void;
}