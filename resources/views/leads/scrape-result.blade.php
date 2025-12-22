@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Scrape Results</h1>

<div class="grid grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold mb-2">Emails Found</h3>
        <ul class="list-disc ml-4">
            @foreach($emails as $email)
                <li>{{ $email }}</li>
            @endforeach
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold mb-2">Phones Found</h3>
        <ul class="list-disc ml-4">
            @foreach($phones as $phone)
                <li>{{ $phone }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection