<?php

namespace App\Infra\Services;

use App\Services\WebhookInterface;
use StarkBank\Transfer;
use App\Utils\Starkbank as UtilStarkbank;

class Webhook implements WebhookInterface
{
    public function __construct()
    {
        (new UtilStarkbank)->setUser();
    }

    public function execute($data): void
    {
        Transfer::create([$data]);
    }
}
