<?php

namespace App\DTOs\User;

use App\Http\Requests\Register\StoreFormRequest;

class RegisteredDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password
    )
    {
    }

    public static function fromRequest(StoreFormRequest $request): RegisteredDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['name'],
            $requestData['email'],
            $requestData['password']
        );
    }
}
