<?php

namespace Tests\Unit\UseCases;

use App\Services\InvoicesInterface;
use App\UseCases\InvoiceUseCase;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class InvoiceUseCaseTest extends TestCase
{
    protected InvoiceUseCase $sut;
    protected InvoicesInterface $invoicesInterface;

    public function setUp(): void
    {
        parent::setUp();

        $this->invoicesInterface = $this->createMock(InvoicesInterface::class);

        $this->sut = new InvoiceUseCase(
            $this->invoicesInterface
        );
    }

    public function test_should_execute_a_handle_method()
    {
        $this->sut->execute();
        $this->assertTrue(true);        
    }

    public function test_should_return_the_number_of_invoices_to_be_created()
    {
        $reflectionClass = new ReflectionClass($this->sut);
        $reflectionMethod = $reflectionClass->getMethod('dataGenerate');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke($this->sut, 9);
        $this->assertCount(9, $result);
    }
}
