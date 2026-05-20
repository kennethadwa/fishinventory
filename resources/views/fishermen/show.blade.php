<x-app-layout>

    <!-- PAGE TITLE -->
    <x-slot name="title">
        Fisherman Profile
    </x-slot>

    <!-- PAGE SUBTITLE -->
    <x-slot name="subtitle">
        View fisherman information and profile details
    </x-slot>

    <div class="space-y-6">

        <!-- HEADER -->
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $fisherman->full_name }}
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Fisherman profile and operational details
                </p>

            </div>

            <div class="flex items-center gap-3">

                <!-- EDIT -->
                <a href="{{ route('fishermen.edit', $fisherman->id) }}"
                   class="rounded-xl bg-yellow-500 px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-yellow-600">

                    Edit Profile

                </a>

                <!-- BACK -->
                <a href="{{ route('fishermen.index') }}"
                   class="rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-100">

                    Back

                </a>

            </div>

        </div>

        <!-- PROFILE SECTION -->
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            <!-- LEFT SIDE -->
            <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                <div class="flex flex-col items-center text-center">

                    <!-- PROFILE AVATAR -->
                    <div class="flex h-28 w-28 items-center justify-center rounded-full bg-[#0B1F3A] text-4xl font-bold text-white shadow-lg">

                        {{ strtoupper(substr($fisherman->full_name, 0, 1)) }}

                    </div>

                    <!-- NAME -->
                    <h2 class="mt-5 text-2xl font-bold text-gray-800">
                        {{ $fisherman->full_name }}
                    </h2>

                    <!-- STATUS -->
                    @if($fisherman->status == 'active')

                        <span class="mt-3 inline-flex rounded-full bg-green-100 px-4 py-1 text-xs font-semibold text-green-700">
                            Active Fisherman
                        </span>

                    @else

                        <span class="mt-3 inline-flex rounded-full bg-red-100 px-4 py-1 text-xs font-semibold text-red-700">
                            Inactive Fisherman
                        </span>

                    @endif

                </div>

                <!-- QUICK INFO -->
                <div class="mt-8 space-y-5">

                    <!-- CONTACT -->
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Contact Number
                        </p>

                        <p class="mt-2 text-sm font-medium text-gray-700">
                            {{ $fisherman->contact_number ?? 'N/A' }}
                        </p>

                    </div>

                    <!-- BOAT -->
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Boat Name
                        </p>

                        <p class="mt-2 text-sm font-medium text-gray-700">
                            {{ $fisherman->boat_name ?? 'N/A' }}
                        </p>

                    </div>

                    <!-- CREATED -->
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Registered Date
                        </p>

                        <p class="mt-2 text-sm font-medium text-gray-700">
                            {{ $fisherman->created_at->format('F d, Y') }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="xl:col-span-2 space-y-6">

                <!-- PERSONAL INFORMATION -->
                <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                    <div class="mb-6">

                        <h2 class="text-xl font-bold text-gray-800">
                            Personal Information
                        </h2>

                        <p class="mt-1 text-sm text-gray-400">
                            Complete fisherman profile details
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <!-- FULL NAME -->
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Full Name
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-700">
                                {{ $fisherman->full_name }}
                            </p>

                        </div>

                        <!-- STATUS -->
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Status
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-700">
                                {{ ucfirst($fisherman->status) }}
                            </p>

                        </div>

                        <!-- CONTACT -->
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Contact Number
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-700">
                                {{ $fisherman->contact_number ?? 'N/A' }}
                            </p>

                        </div>

                        <!-- BOAT -->
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Boat Name
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-700">
                                {{ $fisherman->boat_name ?? 'N/A' }}
                            </p>

                        </div>

                    </div>

                </div>

                <!-- ADDRESS -->
                <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                    <div class="mb-6">

                        <h2 class="text-xl font-bold text-gray-800">
                            Address
                        </h2>

                        <p class="mt-1 text-sm text-gray-400">
                            Residential information
                        </p>

                    </div>

                    <p class="text-sm leading-relaxed text-gray-700">

                        {{ $fisherman->address ?? 'No address provided.' }}

                    </p>

                </div>

                <!-- NOTES -->
                <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                    <div class="mb-6">

                        <h2 class="text-xl font-bold text-gray-800">
                            Notes
                        </h2>

                        <p class="mt-1 text-sm text-gray-400">
                            Additional remarks and observations
                        </p>

                    </div>

                    <p class="text-sm leading-relaxed text-gray-700">

                        {{ $fisherman->notes ?? 'No notes available.' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>