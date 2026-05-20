<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fishventory') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-800">

<div x-data="{ sidebarOpen: true }" class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-16'"
        class="h-screen sticky top-0 shrink-0 bg-[#0B1F3A] text-white flex flex-col shadow-xl transition-all duration-300">

<!-- HEADER -->
<div class="px-4 py-4 border-b border-white/10 flex items-center">

    <!-- BRAND -->
    <div x-show="sidebarOpen" x-transition class="flex-1">
        <h1 class="text-lg font-bold leading-tight">
            🐟 Fish Inventory
        </h1>
    </div>

    <!-- TOGGLE BUTTON -->
    <button
        @click="sidebarOpen = !sidebarOpen"
        class="text-white text-xl w-8 h-8 flex items-center justify-center rounded hover:bg-[#132A47] transition">

        ☰
    </button>

</div>

        <!-- NAV -->
        <nav class="flex-1 py-4 space-y-2">

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg transition
               {{ request()->routeIs('dashboard') ? 'bg-[#1E3A5F]' : 'hover:bg-[#132A47]' }}">

                <span>🏠</span>
                <span x-show="sidebarOpen" x-transition>Dashboard</span>
            </a>

            <!-- FISHERMEN -->
            <a href="{{ route('fishermen.index') }}"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg transition
               {{ request()->routeIs('fishermen.index') ? 'bg-[#1E3A5F]' : 'hover:bg-[#132A47]' }}">

                <span>👨‍🌾</span>
                <span x-show="sidebarOpen" x-transition>Fishermen</span>
            </a>

            <!-- FISH TYPES -->
            <a href="{{ route('fish-types.index') }}"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg hover:bg-[#132A47] transition">
                <span>🐟</span>
                <span x-show="sidebarOpen" x-transition>Fish Types</span>
            </a>

            <!-- CATCHES -->
            <a href="{{ route('catches.index') }}"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg hover:bg-[#132A47] transition">
                <span>🎣</span>
                <span x-show="sidebarOpen" x-transition>Catches</span>
            </a>

            <!-- INVENTORY -->
            <a href="#"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg hover:bg-[#132A47] transition">
                <span>📦</span>
                <span x-show="sidebarOpen" x-transition>Inventory</span>
            </a>

            <!-- SALES -->
            <a href="#"
               class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg hover:bg-[#132A47] transition">
                <span>💰</span>
                <span x-show="sidebarOpen" x-transition>Sales</span>
            </a>

        </nav>

        <!-- USER -->
        <div class="border-t border-white/10 p-3 text-center text-xs text-gray-300">

            <div class="text-white font-semibold" x-show="sidebarOpen" x-transition>
                <h1>👤 Logged In: {{ Auth::user()->name }}</h1>
            </div>

            <!-- when collapsed -->
            <div x-show="!sidebarOpen" x-transition>
                👤
            </div>

        </div>

    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOP BAR -->
        <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">

            <div class="flex items-center gap-3">
    <div>

        <!-- TITLE -->
        <h2 class="text-lg font-semibold text-gray-700">
            {{ $title ?? 'Dashboard' }}
        </h2>

        <!-- SUBTITLE -->
        <p class="text-xs text-gray-400">
            {{ $subtitle ?? 'Manage your fishing operations' }}
        </p>

    </div>
</div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-sm text-red-500 hover:text-red-600 font-medium">
                    Logout
                </button>
            </form>

        </header>

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto p-6">
            {{ $slot }}
        </main>

    </div>

</div>

</body>
</html>