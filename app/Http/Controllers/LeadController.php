<?php

namespace App\Http\Controllers;

use App\DTOs\Lead\LeadDTO;
use App\Http\Requests\Lead\StoreFromRequest;
use App\Models\Lead;
use App\Models\Status;
use App\Services\Lead\LeadService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(StoreFromRequest $request): RedirectResponse
    {
        $dto = LeadDTO::fromRequest($request);

        $lead = LeadService::created($dto);

        session()->flash('success', 'Заявка отправлена');

        return back();
    }

    public function show(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $leads = Lead::query()->with('status')->get();
        $statuses = Status::all();

        return view('user.statistics', compact('leads', 'statuses'));
    }

    public function statusUpdate(Lead $lead, Request $request): void
    {
        $lead->update([
            'status_id' => $request->status
        ]);
    }

    public function leadDelete()
    {

    }

    public function leadEdit()
    {

    }

    public function leadUpdate()
    {

    }
}
