<x-app-layout>

    <x-slot name="title">
        Add Fisherman
    </x-slot>

    <x-slot name="subtitle">
        Register a new fisherman profile
    </x-slot>

    <div class="mx-auto max-w-7xl">

        <!-- PAGE HEADER -->
        <div class="mb-8 flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Add Fisherman
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Fill in the fisherman information below.
                </p>
            </div>

            <a href="{{ route('fishermen.index') }}"
               class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                ← Back
            </a>

        </div>

        <!-- VALIDATION ERRORS -->
        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">
                <ul class="list-disc space-y-1 pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('fishermen.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                <!-- LEFT SIDE -->
                <div class="space-y-6">

                    <!-- FULL NAME -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Enter full name"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">
                    </div>

                    <!-- CONTACT NUMBER -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            placeholder="09XXXXXXXXX"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">
                    </div>

                    <!-- BOAT NAME -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Boat Name
                        </label>

                        <input
                            type="text"
                            name="boat_name"
                            value="{{ old('boat_name') }}"
                            placeholder="Enter boat name"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">
                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="space-y-6">

                    <!-- STATUS -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>

                        </select>
                    </div>

                    <!-- ADDRESS -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Address
                        </label>

                        <textarea
                            name="address"
                            rows="5"
                            placeholder="Enter complete address"
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">{{ old('address') }}</textarea>
                    </div>

                    <!-- NOTES -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="5"
                            placeholder="Additional notes..."
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10">{{ old('notes') }}</textarea>
                    </div>

                </div>

            </div>

            <!-- ACTION BUTTONS -->
            <div class="mt-10 flex items-center justify-end gap-4">

                <a href="{{ route('fishermen.index') }}"
                   class="rounded-xl border border-gray-300 bg-white px-6 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#0B1F3A] px-8 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-[#16345B]">

                    Save Information

                </button>

            </div>

        </form>

    </div>

</x-app-layout>