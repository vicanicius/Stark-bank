<?php

namespace Tests\Unit\UseCases;

use App\Services\WebhookInterface;
use App\UseCases\WebhookUseCase;
use PHPUnit\Framework\TestCase;

class WebhookUseCaseTest extends TestCase
{
    protected WebhookUseCase $sut;
    protected WebhookInterface $webhookInterface;

    public function setUp(): void
    {
        parent::setUp();

        $this->webhookInterface = $this->createMock(WebhookInterface::class);

        $this->sut = new WebhookUseCase(
            $this->webhookInterface
        );
    }

    public function test_should_execute_a_handle_method()
    {
        $data = json_decode(file_get_contents('tests/MockData/webhookCredited.json'), JSON_OBJECT_AS_ARRAY);

        $this->webhookInterface->expects($this->once())
            ->method('execute');

        $this->sut->execute($data);
    }

    public function test_should_not_execute_a_handle_method()
    {
        $data = json_decode(file_get_contents('tests/MockData/webhookPaid.json'), JSON_OBJECT_AS_ARRAY);

        $this->webhookInterface->expects($this->never())
            ->method('execute');

        $this->sut->execute($data);
    }
}
