<?php

namespace App\DTOs\User;

use App\Http\Requests\password\ResetPasswordFormRequest;

class ResetPasswordDTO
{
    public function __construct(
        public readonly string $token,
        public readonly string $email,
        public readonly string $password
    )
    {
    }

    public static function fromRequest(ResetPasswordFormRequest $request): ResetPasswordDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['token'],
            $requestData['email'],
            $requestData['password']
        );
    }
}
