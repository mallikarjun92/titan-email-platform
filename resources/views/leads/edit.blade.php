@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Edit Lead</h1>

@if ($errors->any())
    <div class="mb-6 p-4 rounded bg-red-50 border border-red-200 text-red-700">
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded shadow max-w-xl">
    <form method="POST"
          action="{{ route('leads.update', $lead) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text"
               name="name"
               value="{{ old('name', $lead->name) }}"
               class="w-full border px-3 py-2 rounded"
               placeholder="Name">

        <input type="text"
               name="company"
               value="{{ old('company', $lead->company) }}"
               class="w-full border px-3 py-2 rounded"
               placeholder="Company">

        <input type="email"
               name="email"
               value="{{ old('email', $lead->email) }}"
               class="w-full border px-3 py-2 rounded"
               placeholder="Email">

        <input type="text"
               name="phone"
               value="{{ old('phone', $lead->phone) }}"
               class="w-full border px-3 py-2 rounded"
               placeholder="Phone">

        <input type="url"
               name="website"
               value="{{ old('website', $lead->website) }}"
               class="w-full border px-3 py-2 rounded"
               placeholder="Website">

        <div class="flex gap-3">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update Lead
            </button>

            <a href="{{ route('leads.index') }}"
               class="px-4 py-2 border rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
