@extends('layouts.app')

@section('content')

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
                <th class="p-3 text-center">Actions</th>
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

                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('leads.edit', $lead) }}"
                    class="text-indigo-600 hover:underline">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('leads.destroy', $lead) }}"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline"
                                onclick="return confirm('Delete this lead?')" style="cursor: pointer">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection