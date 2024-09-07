<?php

namespace App\DTOs\User;

class ResetPasswordDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $email,
        public readonly string $password
    )
    {
    }

    public static function fromRequest(ResetPasswordFormRequest $request): ResetPasswordDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['id'],
            $requestData['email'],
            $requestData['password']
        );
    }
}
