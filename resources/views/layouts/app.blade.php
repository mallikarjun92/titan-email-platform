<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title', config('app.name'))
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-sm">
        <div class="px-6 py-6 border-b">
            <div class="text-lg font-semibold tracking-tight">
                Titan Platform
            </div>
            <div class="text-xs text-slate-500">
                Outreach Operations
            </div>
        </div>

        <nav class="px-4 py-4 space-y-1 text-sm">

            @php
                $nav = 'block px-4 py-2 rounded-lg transition';
                $active = 'bg-indigo-50 text-indigo-700 font-medium';
                $idle = 'hover:bg-slate-100';
            @endphp

            <a href="{{ route('dashboard') }}"
            class="{{ $nav }} {{ request()->routeIs('dashboard') ? $active : $idle }}">
                Dashboard
            </a>

            <a href="{{ route('leads.index') }}"
            class="{{ $nav }} {{ request()->routeIs('leads.*') ? $active : $idle }}">
                Leads
            </a>

            <a href="{{ route('campaigns.index') }}"
            class="{{ $nav }} {{ request()->routeIs('campaigns.*') ? $active : $idle }}">
                Campaigns
            </a>

            <a href="/analytics"
            class="{{ $nav }} {{ request()->is('analytics') ? $active : $idle }}">
                Analytics
            </a>

        </nav>
    </aside>


    <!-- Main Content -->
    <main class="flex-1 p-8">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="mb-6 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-red-800 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</div>

</body>
</html>
