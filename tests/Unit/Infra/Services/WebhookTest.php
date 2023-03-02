<?php

namespace Tests\Unit\Infra\Services;

use App\Infra\Services\Webhook;
use App\Utils\Starkbank;
use PHPUnit\Framework\TestCase;

class WebhookTest extends TestCase
{
    protected Webhook $sut;
    protected Starkbank $starkBank;

    public function setUp(): void
    {
        parent::setUp();

        $this->starkBank = $this->createMock(Starkbank::class);
        $this->sut = new Webhook($this->starkBank);
    }

    public function test_should_execute_a_transfer()
    {
        $data = json_decode(file_get_contents('tests/MockData/webhookCredited.json'), JSON_OBJECT_AS_ARRAY);

        $dataToTransfer =
            [
                "amount" => $data['event']['log']['invoice']['amount'],
                "bankCode" => env('DEFAULT_BANK_CODE'),
                "branchCode" => env('DEFAULT_BRANCH_CODE'),
                "accountNumber" => env('DEFAULT_ACCOUNT_NUMBER'),
                "taxId" => env('DEFAULT_TAX_ID'),
                "name" => env('DEFAULT_NAME'),
                "accountType" => env('DEFAULT_ACCOUNT_TYPE'),
                "tags" => ["challenge-test"],
            ];

        $this->sut->execute($dataToTransfer);
        $this->assertTrue(true);
    }
}
