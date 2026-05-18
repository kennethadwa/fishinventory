<x-app-layout>

    <x-slot name="title">
        Dashboard
    </x-slot>

    <x-slot name="subtitle">
        Overview of fishing inventory and sales
    </x-slot>

    <div class="space-y-6">

        <!-- WELCOME SECTION -->
        <div class="bg-gradient-to-r from-[#0B1F3A] to-[#16345B] rounded-2xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold">
                Welcome back, {{ Auth::user()->name }} 👋
            </h1>

            <p class="text-sm text-blue-100 mt-2">
                Here's what's happening in your fishing business today.
            </p>
        </div>

        <!-- DASHBOARD CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- TOTAL SALES -->
            <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">
                            Total Sales
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            ₱25,450
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                        💰
                    </div>
                </div>

                <p class="text-xs text-green-600 mt-4 font-medium">
                    +12% from yesterday
                </p>

            </div>

            <!-- TOTAL INVENTORY -->
            <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">
                            Fish Inventory
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            1,240 KG
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">
                        🐟
                    </div>
                </div>

                <p class="text-xs text-blue-600 mt-4 font-medium">
                    Updated today
                </p>

            </div>

            <!-- TOTAL FISHERMEN -->
            <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">
                            Active Fishermen
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            18
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-yellow-100 flex items-center justify-center text-2xl">
                        👨‍🌾
                    </div>
                </div>

                <p class="text-xs text-yellow-600 mt-4 font-medium">
                    3 currently at sea
                </p>

            </div>

            <!-- TOTAL CATCHES -->
            <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">
                            Today's Catch
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            320 KG
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-2xl">
                        🎣
                    </div>
                </div>

                <p class="text-xs text-red-600 mt-4 font-medium">
                    Freshly delivered
                </p>

            </div>

        </div>

        <!-- CHARTS SECTION -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- SALES CHART -->
            <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Weekly Sales Overview
                        </h2>

                        <p class="text-sm text-gray-400">
                            Fish market performance this week
                        </p>
                    </div>

                    <button class="text-sm bg-[#0B1F3A] text-white px-4 py-2 rounded-lg hover:bg-[#16345B] transition">
                        Export
                    </button>
                </div>

                <!-- FAKE CHART -->
                <div class="h-80 flex items-end gap-4">

                    <div class="flex-1 bg-blue-100 rounded-t-xl h-32"></div>

                    <div class="flex-1 bg-blue-200 rounded-t-xl h-52"></div>

                    <div class="flex-1 bg-blue-300 rounded-t-xl h-40"></div>

                    <div class="flex-1 bg-blue-400 rounded-t-xl h-64"></div>

                    <div class="flex-1 bg-blue-500 rounded-t-xl h-48"></div>

                    <div class="flex-1 bg-blue-600 rounded-t-xl h-72"></div>

                    <div class="flex-1 bg-blue-700 rounded-t-xl h-56"></div>

                </div>

            </div>

            <!-- QUICK STATS -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-800">
                    Quick Statistics
                </h2>

                <p class="text-sm text-gray-400 mt-1">
                    Daily operational insights
                </p>

                <div class="space-y-5 mt-6">

                    <div>
                        <div class="flex justify-between mb-2 text-sm">
                            <span class="text-gray-600">Daily Sales Goal</span>
                            <span class="font-semibold">75%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-green-500 h-3 rounded-full w-3/4"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2 text-sm">
                            <span class="text-gray-600">Inventory Capacity</span>
                            <span class="font-semibold">60%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full w-3/5"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2 text-sm">
                            <span class="text-gray-600">Market Demand</span>
                            <span class="font-semibold">90%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-yellow-500 h-3 rounded-full w-[90%]"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- RECENT ACTIVITIES -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Recent Activities
                    </h2>

                    <p class="text-sm text-gray-400">
                        Latest operations and transactions
                    </p>
                </div>

                <button class="text-sm text-[#0B1F3A] font-medium hover:underline">
                    View All
                </button>

            </div>

            <div class="mt-6 space-y-4">

                <!-- ACTIVITY -->
                <div class="flex items-center justify-between border-b pb-4">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
                            🎣
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-700">
                                New catch recorded
                            </h3>

                            <p class="text-sm text-gray-400">
                                120 KG Tuna added to inventory
                            </p>
                        </div>

                    </div>

                    <span class="text-xs text-gray-400">
                        5 mins ago
                    </span>

                </div>

                <!-- ACTIVITY -->
                <div class="flex items-center justify-between border-b pb-4">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-xl">
                            💰
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-700">
                                New sale completed
                            </h3>

                            <p class="text-sm text-gray-400">
                                ₱5,400 market transaction
                            </p>
                        </div>

                    </div>

                    <span class="text-xs text-gray-400">
                        20 mins ago
                    </span>

                </div>

                <!-- ACTIVITY -->
                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center text-xl">
                            👨‍🌾
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-700">
                                Fisherman added
                            </h3>

                            <p class="text-sm text-gray-400">
                                New fisherman profile registered
                            </p>
                        </div>

                    </div>

                    <span class="text-xs text-gray-400">
                        1 hour ago
                    </span>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>