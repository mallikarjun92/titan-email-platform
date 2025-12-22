<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;
use App\Models\Campaign;
use App\Models\EmailAccount;
use App\Models\Lead;


class AnalyticsController extends Controller
{
    //
    // public function index()
    // {
    //     return view('analytics.index', [
    //         'totalSent' => EmailLog::count(),
    //         'campaigns' => Campaign::withCount('emailLogs')->get(),
    //         'accounts' => EmailAccount::all()
    //     ]);
    // }

    public function index()
    {
        return view('analytics.index', [
            'totalSent' => EmailLog::count(),
            'campaigns' => Campaign::withCount('emailLogs')->get(),
            'accounts'  => EmailAccount::all(),

            'campaignStats' => [
                'draft' => Campaign::where('status', 'draft')->count(),
                'sent'  => Campaign::where('status', 'sent')->count(),
            ],

            'leadStats' => [
                'total' => Lead::count(),
                'with_email' => Lead::whereNotNull('email')->count(),
                'without_email' => Lead::whereNull('email')->count(),
            ],

            'recentEmails' => EmailLog::with('campaign', 'lead')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
