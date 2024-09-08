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



        return view('leads.statistics', compact('leads', 'statuses'));
    }

    public function statusUpdate(Lead $lead, Request $request): RedirectResponse
    {
        $lead->update([
            'status_id' => $request->status
        ]);
    }

    public function leadDelete($id): RedirectResponse
    {
        Lead::query()->find($id)->delete();
        return back();
    }

    public function leadEdit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $lead = new Lead;

        return view('leads.edit', [
            'lead' => $lead->query()->find($id)
        ]);
    }

    public function leadUpdate($id, StoreFromRequest $request): RedirectResponse
    {
        $dto = LeadDTO::fromRequest($request);

        Lead::query()->find($id)->update([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone_number' => $dto->phone_number,
            'lead_text' => $dto->request
        ]);

        session()->flash('success', 'Данные лида обновлена');

        return redirect()->route('statistics');
    }
}
