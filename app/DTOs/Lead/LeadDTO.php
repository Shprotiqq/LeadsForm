<?php

namespace App\DTOs\Lead;

use App\Http\Requests\Lead\StoreFromRequest;

class LeadDTO
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly int $number,
        public readonly string $email,
        public readonly string $request
    )
    {
    }

    public static function fromRequest(StoreFromRequest $request): LeadDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['first_name'],
            $requestData['last_name'],
            $requestData['number'],
            $requestData['email'],
            $requestData['request']
        );
    }
}
