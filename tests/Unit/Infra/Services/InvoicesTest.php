<?php

namespace Tests\Unit\Infra\Services;

use App\Infra\Services\Invoices;
use App\Utils\Starkbank;
use PHPUnit\Framework\TestCase;

use function App\Helpers\cpfRandom;
use function App\Helpers\getRandomName;

class InvoicesTest extends TestCase
{
    protected Invoices $sut;
    protected Starkbank $starkBank;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->starkBank = $this->createMock(Starkbank::class);
        $this->sut = new Invoices($this->starkBank);
    }

    public function test_should_create_a_invoice()
    {
        $data = [
            [
                "amount" => rand(100000, 900000),
                "taxId" => cpfRandom(),
                "name" => getRandomName(),
                "tags" => [
                    'challenge'
                ],
                "descriptions" => [
                    [
                        "key" => "challenge",
                        "value" => "approved"
                    ]
                ],
            ]
        ];

        $this->sut->create($data);
        $this->assertTrue(true);
    }
}
