<x-app-layout>

    <x-slot name="title">
        Add Fish Type
    </x-slot>

    <x-slot name="subtitle">
        Create a new fish category with pricing and description
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between">

            <!-- BACK -->
            <a href="{{ route('fish-types.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">

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

        </div>

        <!-- FORM -->
        <form action="{{ route('fish-types.store') }}"
              method="POST"
              class="space-y-8">

            @csrf

            <!-- HEADER -->
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="flex flex-col gap-5 border-b border-gray-200 px-8 py-6 md:flex-row md:items-center md:justify-between">

                    <!-- TITLE -->
                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0B1F3A]/10 text-xl">

                            🐟

                        </div>

                        <div>

                            <h1 class="text-2xl font-bold text-gray-800">
                                New Fish Type
                            </h1>

                            <p class="mt-1 text-sm text-gray-500">
                                Add fish information and pricing
                            </p>

                        </div>

                    </div>

                    <!-- PROFIT PREVIEW -->
                    <div class="rounded-2xl bg-green-50 px-6 py-4 text-center">

                        <p class="text-xs font-semibold uppercase tracking-wide text-green-600">
                            Estimated Profit Margin
                        </p>

                        <h2 id="profitPreview" class="mt-1 text-2xl font-bold text-green-700">
                            ₱0.00
                        </h2>

                    </div>

                </div>

                <!-- FORM CONTENT -->
                <div class="space-y-8 px-8 py-8">

                    <!-- FISH NAME -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Fish Name <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="fish_name"
                            value="{{ old('fish_name') }}"
                            placeholder="e.g. Tilapia"
                            class="mt-2 w-full max-w-3xl rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10">

                        @error('fish_name')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- PRICES -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                        <!-- BUY PRICE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700">
                                Default Buy Price (₱)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="default_buy_price"
                                id="buyPrice"
                                value="{{ old('default_buy_price') }}"
                                placeholder="0.00"
                                class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10">

                            @error('default_buy_price')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- SELL PRICE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700">
                                Default Sell Price (₱)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="default_sell_price"
                                id="sellPrice"
                                value="{{ old('default_sell_price') }}"
                                placeholder="0.00"
                                class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10">

                            @error('default_sell_price')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    <!-- DESCRIPTION -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            placeholder="Enter fish description..."
                            class="mt-2 w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </div>

            <!-- ACTIONS -->
            <div class="flex items-center justify-end gap-3">

                <a href="{{ route('fish-types.index') }}"
                   class="rounded-xl border border-gray-200 bg-white px-6 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#0B1F3A] px-6 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#16345B]">

                    Save Fish Type

                </button>

            </div>

        </form>

    </div>

    <!-- LIVE PROFIT CALCULATOR -->
    <script>
        const buyPrice = document.getElementById('buyPrice');
        const sellPrice = document.getElementById('sellPrice');
        const profitPreview = document.getElementById('profitPreview');

        function updateProfit() {

            const buy = parseFloat(buyPrice.value) || 0;
            const sell = parseFloat(sellPrice.value) || 0;

            const profit = sell - buy;

            profitPreview.innerText = `₱${profit.toFixed(2)}`;
        }

        buyPrice.addEventListener('input', updateProfit);
        sellPrice.addEventListener('input', updateProfit);
    </script>

</x-app-layout>