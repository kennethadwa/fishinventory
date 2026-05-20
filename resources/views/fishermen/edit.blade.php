<x-app-layout>

    <x-slot name="title">
        Edit Fisherman
    </x-slot>

    <x-slot name="subtitle">
        Update fisherman information
    </x-slot>

    <div class="mx-auto max-w-7xl">

        <!-- PAGE HEADER -->
        <div class="mb-8 flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Edit Fisherman
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Modify the fisherman information below.
                </p>
            </div>

            <a href="{{ route('fishermen.index') }}"
               class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                ← Back
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

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
        <form action="{{ route('fishermen.update', $fisherman->id) }}" method="POST">

            @csrf
            @method('PUT')

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
                            value="{{ old('full_name', $fisherman->full_name) }}"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10"
                            placeholder="Enter full name">
                    </div>

                    <!-- CONTACT -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            name="contact_number"
                            value="{{ old('contact_number', $fisherman->contact_number) }}"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10"
                            placeholder="09XXXXXXXXX">
                    </div>

                    <!-- BOAT NAME -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Boat Name
                        </label>

                        <input
                            type="text"
                            name="boat_name"
                            value="{{ old('boat_name', $fisherman->boat_name) }}"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10"
                            placeholder="Enter boat name">
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

                            <option value="active"
                                {{ old('status', $fisherman->status) == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ old('status', $fisherman->status) == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

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
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10"
                            placeholder="Enter complete address">{{ old('address', $fisherman->address) }}</textarea>
                    </div>

                    <!-- NOTES -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="5"
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/10"
                            placeholder="Additional notes...">{{ old('notes', $fisherman->notes) }}</textarea>
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

                    Update Fisherman

                </button>

            </div>

        </form>

    </div>

</x-app-layout>