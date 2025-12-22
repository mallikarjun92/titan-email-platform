@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Create Campaign</h1>

<div class="bg-white p-6 rounded shadow max-w-2xl">
    <form method="POST" action="{{ route('campaigns.store') }}" class="space-y-4">
        @csrf

        <input name="name" class="w-full border px-3 py-2 rounded" placeholder="Campaign Name">
        <input name="subject" class="w-full border px-3 py-2 rounded" placeholder="Email Subject">

        <textarea name="body" rows="6"
                  class="w-full border px-3 py-2 rounded"
                  placeholder="Email body..."></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save Campaign
        </button>
    </form>
</div>
@endsection