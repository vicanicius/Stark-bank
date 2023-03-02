<?php

namespace App\UseCases;

use App\Services\WebhookInterface;

class WebhookUseCase
{
    public function __construct(
        protected WebhookInterface $webhookInterface
    ) {
        $this->webhookInterface = $webhookInterface;
    }

    public function execute($data): void
    {
        if ($data['event']['log']['type']  == "credited") {
            $dataForTransfer = [
                "amount" => $data['event']['log']['invoice']['amount'],
                "bankCode" => env('DEFAULT_BANK_CODE'),
                "branchCode" => env('DEFAULT_BRANCH_CODE'),
                "accountNumber" => env('DEFAULT_ACCOUNT_NUMBER'),
                "taxId" => env('DEFAULT_TAX_ID'),
                "name" => env('DEFAULT_NAME'),
                "accountType" => env('DEFAULT_ACCOUNT_TYPE'),
                "tags" => ["challenge"],
                "externalId" => $data['event']["id"],
            ];

            $this->webhookInterface->execute($dataForTransfer);
        }
    }
}
