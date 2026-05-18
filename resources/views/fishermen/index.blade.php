<x-app-layout>

    <!-- PAGE TITLE -->
    <x-slot name="title">
        Fishermen Management
    </x-slot>

    <!-- PAGE SUBTITLE -->
    <x-slot name="subtitle">
        Manage fishermen profiles, boats, and status
    </x-slot>

    <div class="space-y-6">

        <!-- TOP SECTION -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <!-- LEFT -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Fishermen
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    View and manage all registered fishermen.
                </p>
            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-3">

                <!-- SEARCH -->
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search fishermen..."
                        class="w-72 rounded-xl border border-gray-200 bg-white py-2.5 pl-11 pr-4 text-sm shadow-sm focus:border-[#0B1F3A] focus:ring-[#0B1F3A]"
                    >

                    <span class="absolute left-4 top-2.5 text-gray-400">
                        🔍
                    </span>
                </div>

                <!-- ADD BUTTON -->
                <button
                    class="rounded-xl bg-[#0B1F3A] px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-[#16345B] transition">

                    + Add Fisherman
                </button>

            </div>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <!-- TOTAL -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Total Fishermen
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            18
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                        👨‍🌾
                    </div>

                </div>

            </div>

            <!-- ACTIVE -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Active
                        </p>

                        <h2 class="text-3xl font-bold text-green-600 mt-2">
                            15
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">
                        ✅
                    </div>

                </div>

            </div>

            <!-- INACTIVE -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Inactive
                        </p>

                        <h2 class="text-3xl font-bold text-red-500 mt-2">
                            3
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">
                        ⛔
                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- TABLE HEADER -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Fishermen List
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Registered fishermen records
                    </p>
                </div>

                <!-- FILTER -->
                <button
                    class="rounded-xl border border-gray-200 px-4 py-2 text-sm hover:bg-gray-50 transition">

                    Filter
                </button>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <!-- HEAD -->
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">

                        <tr>

                            <th class="px-6 py-4 font-semibold">
                                Fisherman
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Contact
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Boat Name
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Address
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 font-semibold text-center">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y divide-gray-100">

                        <!-- ROW -->
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
                                        👨‍🌾
                                    </div>

                                    <div>
                                        <h3 class="font-semibold text-gray-800">
                                            Juan Dela Cruz
                                        </h3>

                                        <p class="text-xs text-gray-400 mt-1">
                                            Fisherman ID #001
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-gray-600">
                                09123456789
                            </td>

                            <td class="px-6 py-5 text-gray-600">
                                Sea Warrior
                            </td>

                            <td class="px-6 py-5 text-gray-600">
                                Puerto Real, Quezon
                            </td>

                            <td class="px-6 py-5">

                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                    Active
                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- VIEW -->
                                    <button
                                        class="rounded-lg bg-blue-100 px-3 py-2 text-xs font-medium text-blue-700 hover:bg-blue-200 transition">

                                        View
                                    </button>

                                    <!-- EDIT -->
                                    <button
                                        class="rounded-lg bg-yellow-100 px-3 py-2 text-xs font-medium text-yellow-700 hover:bg-yellow-200 transition">

                                        Edit
                                    </button>

                                    <!-- DELETE -->
                                    <button
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-medium text-red-700 hover:bg-red-200 transition">

                                        Delete
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>