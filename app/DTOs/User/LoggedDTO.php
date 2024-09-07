<?php

namespace App\DTOs\User;

use App\Http\Requests\Login\StoreFormRequest;

class LoggedDTO
{

    public function __construct(
        public readonly string $email,
        public readonly string $password
    )
    {
    }

    public static function fromRequest(StoreFormRequest $request): LoggedDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['email'],
            $requestData['password']
        );
    }
}
