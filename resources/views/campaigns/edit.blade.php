@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Edit Campaign</h1>

@if ($errors->any())
    <div class="mb-6 p-4 rounded bg-red-50 border border-red-200 text-red-700">
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded shadow max-w-2xl">
    <form method="POST"
          action="{{ route('campaigns.update', $campaign) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <input
            name="name"
            value="{{ old('name', $campaign->name) }}"
            class="w-full border px-3 py-2 rounded"
            placeholder="Campaign Name">

        <input
            name="subject"
            value="{{ old('subject', $campaign->subject) }}"
            class="w-full border px-3 py-2 rounded"
            placeholder="Email Subject">

        <textarea
            name="body"
            rows="6"
            class="w-full border px-3 py-2 rounded"
            placeholder="Email body...">{{ old('body', $campaign->body) }}</textarea>

        <div class="flex gap-3">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update Campaign
            </button>

            <a href="{{ route('campaigns.index') }}"
               class="px-4 py-2 border rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
