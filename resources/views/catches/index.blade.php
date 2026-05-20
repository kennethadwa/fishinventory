<x-app-layout>

    <x-slot name="title">
        Catches
    </x-slot>

    <x-slot name="subtitle">
        Manage fish catch records, deliveries, and totals
    </x-slot>

    <div class="space-y-6">

        <!-- TOP BAR -->
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <!-- SEARCH -->
            <form method="GET" action="{{ route('catches.index') }}">

                <div class="relative">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search fisherman..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-900 shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10 sm:w-[28rem]">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="pointer-events-none absolute left-4 top-3.5 h-4 w-4 text-gray-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 16.5a7.5 7.5 0 0011.15 0z"/>

                    </svg>

                </div>

            </form>

            <!-- ADD BUTTON -->
            <a href="{{ route('catches.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-[#0B1F3A] px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#16345B]">

                + Add Catch

            </a>

        </div>

        <!-- HEADER -->
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-5">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Catch Records
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Track fish deliveries and harvest performance
                    </p>
                </div>

                <div class="text-sm text-gray-400">
                    Total:
                    <span class="font-semibold text-gray-700">
                        {{ $catches->total() }}
                    </span>
                </div>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Fisherman
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Date
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Weight
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Amount
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Created By
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($catches as $catch)

                            <tr class="hover:bg-gray-50 transition">

                                <!-- FISHERMAN -->
                                <td class="px-6 py-5 font-semibold text-gray-800 whitespace-nowrap">
                                    {{ $catch->fisherman->full_name ?? 'Unknown' }}
                                </td>

                                <!-- DATE -->
                                <td class="px-6 py-5 text-sm text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($catch->delivery_date)->format('M d, Y h:i A') }}
                                </td>

                                <!-- WEIGHT -->
                                <td class="px-6 py-5 text-sm text-gray-700 whitespace-nowrap">
                                    {{ number_format($catch->total_weight, 2) }} kg
                                </td>

                                <!-- AMOUNT -->
                                <td class="px-6 py-5 text-sm font-semibold text-gray-800 whitespace-nowrap">
                                    ₱{{ number_format($catch->total_amount, 2) }}
                                </td>

                                <!-- CREATED BY -->
                                <td class="px-6 py-5 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $catch->creator->name ?? 'System' }}
                                </td>

                                <!-- ACTIONS -->
                                <td class="px-6 py-5 text-right whitespace-nowrap">

                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('catches.show', $catch->id) }}"
                                           class="rounded-lg border px-3 py-2 text-xs text-gray-700 hover:bg-gray-100">

                                            View

                                        </a>

                                        <a href="{{ route('catches.edit', $catch->id) }}"
                                           class="rounded-lg border border-blue-100 bg-blue-50 px-3 py-2 text-xs text-blue-700 hover:bg-blue-100">

                                            Edit

                                        </a>

                                        <form action="{{ route('catches.destroy', $catch->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this catch?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs text-red-600 hover:bg-red-100">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                                    No catch records found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- PAGINATION -->
        <div>
            {{ $catches->links() }}
        </div>

    </div>

</x-app-layout>