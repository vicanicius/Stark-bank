<?php

namespace App\UseCases;

use App\Services\InvoicesInterface;

use function App\Helpers\cpfRandom;
use function App\Helpers\getRandomName;

class InvoiceUseCase
{
    public function __construct(
        protected InvoicesInterface $invoicesInterface
    ) {
        $this->invoicesInterface = $invoicesInterface;
    }

    public function execute(): void
    {
        $data = $this->dataGenerate(rand(1, 1));

        $this->invoicesInterface->create($data);
    }

    private function dataGenerate($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $invoices[] =
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
                ];
        }

        return $invoices;
    }
}