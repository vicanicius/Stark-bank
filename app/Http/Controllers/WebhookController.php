<?php

namespace App\Http\Controllers;

use App\UseCases\WebhookUseCase;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __construct(
        protected WebhookUseCase $webhookUseCase
    ) {
        $this->webhookUseCase = $webhookUseCase;
    }
    
    public function handleWebhook(Request $request)
    {
        $this->webhookUseCase->execute($request->all());
        
        return response()->json([], 200);
    }
}
