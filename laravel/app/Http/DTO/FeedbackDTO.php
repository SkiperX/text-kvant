<?php

namespace App\Http\DTO;

use App\Http\Requests\FeedbackRequest;

class FeedbackDTO
{
    public string $name;
    public string $phone;
    public string $message;

    public function __construct(
        FeedbackRequest $request
    )
    {
        $this->name = data_get($request, 'name');
        $this->phone = data_get($request, 'phone');
        $this->message = data_get($request, 'message');
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }
}
