@extends('layouts.app')

@section('content')
{{-- <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Leads</h1>
    <a href="{{ route('leads.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Add Lead
    </a>
</div>

<!-- Scrape Form -->
<div class="bg-white p-6 rounded shadow mb-6">
    <form method="POST" action="/leads/scrape" class="flex gap-4">
        @csrf
        <input type="url" name="website" required
               placeholder="https://company-website.com"
               class="flex-1 border rounded px-3 py-2">
        <button class="bg-gray-800 text-white px-4 py-2 rounded">
            Scrape
        </button>
    </form>
</div>

<!-- Leads Table -->
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm"> --}}

<div class="flex justify-between items-center mb-6">
    <h1>Leads</h1>
    <a href="{{ route('leads.create') }}" class="btn btn-primary">
        Add Lead
    </a>
</div>

<div class="card mb-6">
    <div class="card-body">
        <form method="POST" action="/leads/scrape" class="flex gap-4">
            @csrf
            <input type="url" name="website" required class="input"
                   placeholder="https://company-website.com">
            <button class="btn btn-secondary">
                Scrape Website
            </button>
        </form>
    </div>
</div>

<div class="card">
    <table class="table">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Company</th>
                <th class="p-3">Email</th>
                <th class="p-3">Phone</th>
                <th class="p-3">Website</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leads as $lead)
            <tr class="border-t">
                <td class="p-3">{{ $lead->name }}</td>
                <td class="p-3">{{ $lead->company }}</td>
                <td class="p-3">{{ $lead->email }}</td>
                <td class="p-3">{{ $lead->phone }}</td>
                <td class="p-3">{{ $lead->website }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection