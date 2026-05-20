<x-app-layout>

    <x-slot name="title">
        Add Catch
    </x-slot>

    <x-slot name="subtitle">
        Record new fish catch, weight, and delivery details
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- BACK -->
        <div class="flex items-center justify-between">

            <a href="{{ route('catches.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">

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

                Back

            </a>

        </div>

        <!-- FORM -->
        <form action="{{ route('catches.store') }}" method="POST" class="space-y-8">

            @csrf

            <!-- HEADER CARD -->
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="flex flex-col gap-5 border-b border-gray-200 px-8 py-6 md:flex-row md:items-center md:justify-between">

                    <!-- TITLE -->
                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0B1F3A]/10 text-xl">
                            🎣
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">
                                New Catch Record
                            </h1>
                            <p class="mt-1 text-sm text-gray-500">
                                Add fisherman delivery details and totals
                            </p>
                        </div>

                    </div>

                    <!-- TOTAL PREVIEW -->
                    <div class="rounded-2xl bg-green-50 px-6 py-4 text-center">

                        <p class="text-xs font-semibold uppercase text-green-600">
                            Total Amount
                        </p>

                        <h2 id="totalPreview" class="mt-1 text-2xl font-bold text-green-700">
                            ₱0.00
                        </h2>

                    </div>

                </div>

                <!-- FORM CONTENT -->
                <div class="space-y-8 px-8 py-8">

                    <!-- FISHERMAN -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Fisherman <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="fisherman_id"
                            class="mt-2 w-full max-w-3xl rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-4 focus:ring-[#0B1F3A]/10">

                            <option value="">Select fisherman</option>

                            @foreach($fishermen as $fisherman)
                                <option value="{{ $fisherman->id }}">
                                    {{ $fisherman->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('fisherman_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- DELIVERY DATE -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Delivery Date
                        </label>

                        <input
                            type="datetime-local"
                            name="delivery_date"
                            value="{{ old('delivery_date') }}"
                            class="mt-2 w-full max-w-3xl rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-4 focus:ring-[#0B1F3A]/10">

                        @error('delivery_date')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- WEIGHT + AMOUNT -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                        <!-- TOTAL WEIGHT -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700">
                                Total Weight (kg)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="total_weight"
                                id="weight"
                                value="{{ old('total_weight') }}"
                                placeholder="0.00"
                                class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-4 focus:ring-[#0B1F3A]/10">

                            @error('total_weight')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- TOTAL AMOUNT -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700">
                                Total Amount (₱)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="total_amount"
                                id="amount"
                                value="{{ old('total_amount') }}"
                                placeholder="0.00"
                                class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-4 focus:ring-[#0B1F3A]/10">

                            @error('total_amount')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>

                    <!-- REMARKS -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Remarks
                        </label>

                        <textarea
                            name="remarks"
                            rows="5"
                            placeholder="Optional notes..."
                            class="mt-2 w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-4 focus:ring-[#0B1F3A]/10">{{ old('remarks') }}</textarea>

                        @error('remarks')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </div>

            <!-- ACTIONS -->
            <div class="flex items-center justify-end gap-3">

                <a href="{{ route('catches.index') }}"
                   class="rounded-xl border border-gray-200 bg-white px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#0B1F3A] px-6 py-3 text-sm font-medium text-white shadow-sm hover:bg-[#16345B]">

                    Save Catch

                </button>

            </div>

        </form>

    </div>

    <!-- LIVE TOTAL CALCULATION -->
    <script>
        const weight = document.getElementById('weight');
        const amount = document.getElementById('amount');
        const totalPreview = document.getElementById('totalPreview');

        function updateTotal() {

            const w = parseFloat(weight.value) || 0;
            const a = parseFloat(amount.value) || 0;

            totalPreview.innerText = `₱${a.toFixed(2)}`;
        }

        weight.addEventListener('input', updateTotal);
        amount.addEventListener('input', updateTotal);
    </script>

</x-app-layout>