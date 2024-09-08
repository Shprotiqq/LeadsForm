<?php

namespace App\Services\Lead;

use App\DTOs\Lead\LeadDTO;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LeadService
{

    public static function created(LeadDTO $dto): Model|Builder
    {
        return Lead::query()->create([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone_number' => $dto->phone_number,
            'lead_text' => $dto->request
        ]);
    }

}



