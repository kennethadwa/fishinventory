<x-app-layout>

    <x-slot name="title">
        Fish Type Details
    </x-slot>

    <x-slot name="subtitle">
        View fish category information and pricing details
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- TOP ACTIONS -->
        <div class="flex items-center justify-between">

            <!-- BACK -->
            <a href="{{ route('fish-types.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

                <!-- ICON -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7" />

                </svg>

                Back to List

            </a>

            <!-- ACTIONS -->
            <div class="flex items-center gap-3">

                <!-- EDIT -->
                <a href="{{ route('fish-types.edit', $fishType->id) }}"
                   class="inline-flex items-center rounded-xl border border-blue-100 bg-blue-50 px-5 py-3 text-sm font-medium text-blue-700 transition hover:bg-blue-100">

                    Edit

                </a>

                <!-- DELETE -->
                <form action="{{ route('fish-types.destroy', $fishType->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this fish type?')">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="inline-flex items-center rounded-xl border border-red-100 bg-red-50 px-5 py-3 text-sm font-medium text-red-600 transition hover:bg-red-100">

                        Delete

                    </button>

                </form>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <!-- HEADER -->
            <div class="border-b border-gray-200 px-8 py-6">

                <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                    <!-- TITLE -->
                    <div>

                        <div class="flex items-center gap-3">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0B1F3A]/10 text-xl">

                                🐟

                            </div>

                            <div>

                                <h1 class="text-2xl font-bold text-gray-800">
                                    {{ $fishType->fish_name }}
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    Fish category and pricing information
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- PROFIT -->
                    @php
                        $profit = ($fishType->default_sell_price ?? 0) - ($fishType->default_buy_price ?? 0);
                    @endphp

                    <div class="rounded-2xl bg-green-50 px-6 py-4 text-center">

                        <p class="text-xs font-semibold uppercase tracking-wide text-green-600">
                            Profit Margin
                        </p>

                        <h2 class="mt-1 text-2xl font-bold text-green-700">
                            ₱{{ number_format($profit, 2) }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- DETAILS -->
            <div class="grid grid-cols-1 gap-6 px-8 py-8 lg:grid-cols-3">

                <!-- BUY PRICE -->
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6">

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Default Buy Price
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-gray-800">

                        @if($fishType->default_buy_price)

                            ₱{{ number_format($fishType->default_buy_price, 2) }}

                        @else

                            <span class="text-gray-400">
                                N/A
                            </span>

                        @endif

                    </h3>

                </div>

                <!-- SELL PRICE -->
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6">

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Default Sell Price
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-gray-800">

                        @if($fishType->default_sell_price)

                            ₱{{ number_format($fishType->default_sell_price, 2) }}

                        @else

                            <span class="text-gray-400">
                                N/A
                            </span>

                        @endif

                    </h3>

                </div>

                <!-- CREATED -->
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6">

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Date Created
                    </p>

                    <h3 class="mt-3 text-lg font-semibold text-gray-800">

                        {{ $fishType->created_at->format('F d, Y') }}

                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        {{ $fishType->created_at->format('h:i A') }}
                    </p>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="border-t border-gray-200 px-8 py-8">

                <h2 class="text-lg font-semibold text-gray-800">
                    Description
                </h2>

                @if($fishType->description)

                    <div class="mt-4 rounded-2xl border border-gray-200 bg-gray-50 p-6">

                        <p class="whitespace-pre-line text-sm leading-relaxed text-gray-700">
                            {{ $fishType->description }}
                        </p>

                    </div>

                @else

                    <div class="mt-4 rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center">

                        <p class="text-sm text-gray-400">
                            No description provided
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>