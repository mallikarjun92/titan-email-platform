<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\EmailLog;
use App\Models\Lead;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'leadCount'     => Lead::count(),
            'campaignCount' => Campaign::count(),
            'emailCount'    => EmailLog::count(),
        ]);
    }
}
