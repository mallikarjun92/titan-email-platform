@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1 class="mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6 mb-8">
    <div class="card">
        <div class="card-body">
            <div class="text-sm text-gray-500">Total Leads</div>
            <div class="text-3xl font-semibold">{{ $leadCount }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="text-sm text-gray-500">Campaigns</div>
            <div class="text-3xl font-semibold">{{ $campaignCount }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="text-sm text-gray-500">Emails Sent</div>
            <div class="text-3xl font-semibold">{{ $emailCount }}</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-3 gap-6">
    <a href="{{ route('leads.index') }}" class="card hover:border-blue-500 transition">
        <div class="card-body">
            <div class="font-medium">Manage Leads</div>
            <div class="text-sm text-gray-500">View and add contacts</div>
        </div>
    </a>

    <a href="{{ route('campaigns.index') }}" class="card hover:border-blue-500 transition">
        <div class="card-body">
            <div class="font-medium">Campaigns</div>
            <div class="text-sm text-gray-500">Create and send emails</div>
        </div>
    </a>

    <a href="/analytics" class="card hover:border-blue-500 transition">
        <div class="card-body">
            <div class="font-medium">Analytics</div>
            <div class="text-sm text-gray-500">View performance</div>
        </div>
    </a>
</div>
@endsection