@extends('layouts.app')
@section('title', 'Campaigns')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1>Campaigns</h1>

    <a href="{{ route('campaigns.create') }}"
       class="btn btn-primary">
        New Campaign
    </a>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th class="w-1/2">Campaign Name</th>
                <th class="w-1/4 text-center">Status</th>
                <th class="w-1/4 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($campaigns as $campaign)
            <tr>
                <td>
                    <div class="font-medium text-slate-800">
                        {{ $campaign->name }}
                    </div>
                </td>

                <td class="text-center">
                    <span class="inline-flex items-center rounded-full
                        px-3 py-1 text-xs font-medium
                        {{ $campaign->status === 'sent'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-slate-100 text-slate-600' }}">
                        {{ ucfirst($campaign->status) }}
                    </span>
                </td>

                <td class="text-center space-x-2">
                    <a href="{{ route('campaigns.edit', $campaign) }}"
                    class="text-indigo-600 hover:underline">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('campaigns.send', $campaign) }}"
                        class="inline">
                        @csrf
                        <button
                            class="text-green-600 hover:underline"
                            {{ $campaign->status === 'sent' ? 'disabled' : '' }}
                            style="cursor: pointer">
                            Send
                        </button>
                    </form>

                    <form method="POST"
                        action="{{ route('campaigns.destroy', $campaign) }}"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Delete this campaign?')"
                            style="cursor: pointer">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-slate-500 py-8">
                    No campaigns created yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
