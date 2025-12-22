<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use App\Services\EmailSenderService;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Show all campaigns
     */
    public function index()
    {
        $campaigns = Campaign::latest()->get();

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show create campaign form
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store new campaign
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body'    => 'required|string',
        ]);

        Campaign::create($validated);

        return redirect()
            ->route('campaigns.index')
            ->with('success', 'Campaign created successfully');
    }

    /**
     * Send campaign emails (mocked Outlook)
     */
    public function send(
        Campaign $campaign,
        EmailSenderService $emailSender
    ) {
        // For MVP: send to all leads
        $leads = Lead::whereNotNull('email')->get();

        $emailSender->sendCampaign($campaign, $leads);

        $campaign->update(['status' => 'sent']);

        return redirect()
            ->back()
            ->with('success', 'Campaign emails sent successfully');
    }

    /**
     * Delete campaign (optional but clean)
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()
            ->route('campaigns.index')
            ->with('success', 'Campaign deleted');
    }
}