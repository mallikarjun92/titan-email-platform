<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::latest()->get();
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'company'    => 'nullable|string|max:255',
            'website'    => 'nullable|url|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
            'source_url' => 'nullable|url|max:255',
        ]);

        Lead::create($validated);

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'name'       => 'nullable|string|max:255',
            'company'    => 'nullable|string|max:255',
            'website'    => 'nullable|url|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        $lead->update($validated);

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead deleted successfully.');
    }

    /**
     * Scrape emails & phones from website
     */
    public function scrape(Request $request)
    {
        $request->validate([
            'website' => 'required|url',
        ]);

        $data = app(\App\Services\ScraperService::class)
            ->scrape($request->website);

        return view('leads.scrape-result', $data);
    }
}
