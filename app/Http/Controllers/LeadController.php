<?php

namespace App\Http\Controllers;

use App\DTOs\Lead\LeadDTO;
use App\Http\Requests\Lead\StoreFromRequest;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(StoreFromRequest $request)
    {
        $dto = LeadDTO::fromRequest($request);

    }
}
