<x-app-layout>

    <x-slot name="title">
        Fish Types
    </x-slot>

    <x-slot name="subtitle">
        Manage fish categories, pricing, and inventory references
    </x-slot>

    <div class="space-y-6">

        <!-- SEARCH + ACTION -->
        <div class="flex items-center justify-between gap-4">

            <!-- SEARCH -->
            <form method="GET" action="{{ route('fish-types.index') }}" id="searchForm">

                <div class="relative">

                    <input
                        type="text"
                        name="search"
                        id="searchInput"
                        value="{{ request('search') }}"
                        placeholder="Search fish type..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10 sm:w-[32rem]">

                    <!-- ICON -->
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
            <a href="{{ route('fish-types.create') }}"
               class="shrink-0 inline-flex items-center justify-center rounded-xl bg-[#0B1F3A] px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#16345B]">

                Add Fish Type

            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <!-- HEADER -->
            <div class="border-b border-gray-200 px-6 py-4">

                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Fish Types List
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            All registered fish categories and pricing information.
                        </p>
                    </div>

                    <div class="text-sm text-gray-400">
                        Total:
                        <span class="font-semibold text-gray-700">
                            {{ $fishTypes->count() }}
                        </span>
                    </div>

                </div>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <!-- HEAD -->
                    <thead class="bg-gray-50">
                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Fish Name
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Buy Price
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Sell Price
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Profit
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Created
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase text-gray-500">
                                Actions
                            </th>

                        </tr>
                    </thead>

                    <!-- BODY (AJAX TARGET) -->
                    <tbody id="fishTableBody">

                        @include('fish-types.partials.table')

                    </tbody>

                </table>

            </div>

        </div>

    </div>






    <!-- DELETE CONFIRMATION MODAL -->
<div
    id="deleteModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">

    <div class="w-full max-w-md rounded-2xl bg-white shadow-2xl">

        <!-- HEADER -->
        <div class="border-b border-gray-100 px-6 py-5">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6 text-red-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-semibold text-gray-800">
                        Delete Fish Type
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        This action cannot be undone.
                    </p>

                </div>

            </div>

        </div>

        <!-- BODY -->
        <div class="px-6 py-5">

            <p class="text-sm leading-relaxed text-gray-600">
                Are you sure you want to permanently delete this fish type?
            </p>

        </div>

        <!-- FOOTER -->
        <div class="flex items-center justify-end gap-3 border-t border-gray-100 px-6 py-4">

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="rounded-xl border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50">

                Cancel

            </button>

            <!-- DELETE FORM -->
            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl bg-red-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-700">

                    Yes, Delete

                </button>

            </form>

        </div>

    </div>

</div>









<script>

    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');

    function openDeleteModal(actionUrl) {

        deleteForm.action = actionUrl;

        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('flex');
    }

    function closeDeleteModal() {

        deleteModal.classList.remove('flex');
        deleteModal.classList.add('hidden');
    }

    // CLOSE WHEN CLICKING BACKDROP
    deleteModal.addEventListener('click', function (e) {

        if (e.target === deleteModal) {
            closeDeleteModal();
        }

    });

</script>











    <!-- AJAX SEARCH SCRIPT -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('fishTableBody');

        let timeout = null;

        searchInput.addEventListener('input', function () {

            clearTimeout(timeout);

            timeout = setTimeout(() => {

                fetch(`{{ route('fish-types.index') }}?search=${searchInput.value}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    tableBody.innerHTML = html;
                });

            }, 400);

        });
    </script>

</x-app-layout>