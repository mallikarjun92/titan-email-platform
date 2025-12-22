@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Analytics</h1>

<div class="grid grid-cols-2 gap-3 mb-4">
    <div class="card">
        <div class="card-body">
            <h3>Total Emails</h3>
            <div class="text-3xl font-semibold">{{ $totalSent }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Campaigns Sent</h3>
            <div class="text-3xl font-semibold">{{ $campaignStats['sent'] }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Leads w/ Email</h3>
            <div class="text-3xl font-semibold">{{ $leadStats['with_email'] }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Leads Missing Email</h3>
            <div class="text-3xl font-semibold text-red-600">
                {{ $leadStats['without_email'] }}
            </div>
        </div>
    </div>
</div>


<div class="card mb-8">
    <div class="card-header">Campaign History</div>
    <table class="table">
        <thead>
            <tr>
                <th>Campaign</th>
                <th class="text-center">Emails Sent</th>
            </tr>
        </thead>
        <tbody>
        @foreach($campaigns as $campaign)
            <tr>
                <td>{{ $campaign->name }}</td>
                <td class="text-center">{{ $campaign->email_logs_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="card mb-8">
    <div class="card-header">Email Account Usage</div>
    <table class="table">
        <thead>
            <tr>
                <th>Account</th>
                <th class="text-center">Sent Today</th>
                <th class="text-center">Limit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{ $account->email }}</td>
                <td class="text-center">{{ $account->sent_today }}</td>
                <td class="text-center">{{ $account->daily_limit }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="card">
    <div class="card-header">Recent Email Activity</div>
    <table class="table">
        <thead>
            <tr>
                <th>Campaign</th>
                <th>Lead</th>
                <th>Sent At</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recentEmails as $log)
            <tr>
                <td>{{ $log->campaign->name ?? '-' }}</td>
                <td>{{ $log->lead->email ?? '-' }}</td>
                <td>{{ $log->sent_at?->format('d M Y, H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection