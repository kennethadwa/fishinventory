<x-app-layout>

    <!-- PAGE TITLE -->
    <x-slot name="title">
        Fishermen Management
    </x-slot>

    <!-- PAGE SUBTITLE -->
    <x-slot name="subtitle">
        Manage fishermen records and monitor active crews
    </x-slot>

    <div class="space-y-6">


<!-- SUCCESS MESSAGE -->
        @if(session('success'))
    <div id="successMessage"
         class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700 shadow-sm">
        {{ session('success') }}
    </div>
@endif

<!-- HEADER -->
<div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

    <!-- LEFT: SEARCH -->
    <form method="GET" action="{{ route('fishermen.index') }}" id="searchForm">
        <div class="relative">

            <input
                type="text"
                name="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Search fisherman..."
                class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm shadow-sm transition focus:border-[#0B1F3A] focus:outline-none focus:ring-4 focus:ring-[#0B1F3A]/10 sm:w-[32rem]">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="absolute left-4 top-3.5 h-4 w-4 text-gray-400"
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

    <!-- RIGHT: ADD BUTTON -->
    <div class="flex justify-start lg:justify-end">

        <a href="{{ route('fishermen.create') }}"
           class="inline-flex items-center justify-center rounded-xl bg-[#0B1F3A] px-5 py-3 text-sm font-medium text-white shadow-md transition hover:bg-[#16345B]">

            Add Fisherman
        </a>

    </div>

</div>



        <!-- STATS -->
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

            <!-- TOTAL -->
            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Total Fishermen
                </p>

                <div class="mt-3 flex items-end justify-between">

                    <h2 class="text-4xl font-bold text-gray-800">
                        {{ $fishermen->count() }}
                    </h2>

                    <div class="rounded-xl bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700">
                        Registered
                    </div>

                </div>

            </div>

            <!-- ACTIVE -->
            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Active Fishermen
                </p>

                <div class="mt-3 flex items-end justify-between">

                    <h2 class="text-4xl font-bold text-green-600">
                        {{ $fishermen->where('status', 'active')->count() }}
                    </h2>

                    <div class="rounded-xl bg-green-50 px-3 py-2 text-xs font-semibold text-green-700">
                        Active
                    </div>

                </div>

            </div>

            <!-- INACTIVE -->
            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Inactive Fishermen
                </p>

                <div class="mt-3 flex items-end justify-between">

                    <h2 class="text-4xl font-bold text-red-500">
                        {{ $fishermen->where('status', 'inactive')->count() }}
                    </h2>

                    <div class="rounded-xl bg-red-50 px-3 py-2 text-xs font-semibold text-red-700">
                        Inactive
                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">

            <!-- TABLE HEADER -->
            <div class="flex flex-col gap-4 border-b border-gray-100 px-6 py-5 lg:flex-row lg:items-center lg:justify-between">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Fishermen Records
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Complete list of registered fishermen
                    </p>
                </div>

                <!-- FILTER -->
                <div class="flex items-center gap-3">

                    <form method="GET" action="{{ route('fishermen.index') }}" id="filterForm">
<select id="statusFilter"
        class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm text-gray-600 shadow-sm focus:border-[#0B1F3A] focus:outline-none">

    <option value="all">All</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>

</select>

</form>

                </div>

            </div>

            <!-- TABLE CONTENT -->
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-100">

                    <!-- HEAD -->
                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Fisherman
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Contact Number
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Boat Name
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Address
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody id="fishermenTable">
        @include('fishermen.partials.table', ['fishermen' => $fishermen])
    </tbody>

                </table>


                <!-- PAGINATION -->
<div class="border-t border-gray-100 px-6 py-4">
    {{ $fishermen->links() }}
</div>


                <form id="deleteForm" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

            </div>

        </div>

    </div>


    <!-- DELETE MODAL -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">

    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">

        <h2 class="text-lg font-semibold text-gray-800">
            Confirm Deletion
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Are you sure you want to delete this fisherman? This action cannot be undone.
        </p>

        <div class="mt-6 flex justify-end gap-3">

            <button
                onclick="closeDeleteModal()"
                class="rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">

                Cancel
            </button>

            <button
                onclick="confirmDelete()"
                class="rounded-xl bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">

                Delete
            </button>

        </div>

    </div>

</div>



<!-- TOAST -->
<div id="toast"
     class="fixed bottom-6 right-6 hidden w-80 rounded-xl bg-white p-4 shadow-lg border border-gray-100 opacity-100 transition-opacity duration-300">

    <div class="flex items-center gap-3">

        <!-- LOADING CIRCLE -->
        <div class="h-5 w-5 animate-spin rounded-full border-2 border-gray-200 border-t-[#0B1F3A]"></div>

        <p id="toastMessage" class="text-sm text-gray-700">
            Loading...
        </p>

    </div>

</div>


</x-app-layout>


<script>
let typingTimer;

const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const tableBody = document.getElementById('fishermenTable');
const toast = document.getElementById('toast');
const toastMsg = document.getElementById('toastMessage');

function showToast(message, autoHide = true) {
    toastMsg.textContent = message;

    toast.classList.remove('hidden', 'opacity-0');

    if (!autoHide) return;

    clearTimeout(toast._timeout);

    toast._timeout = setTimeout(() => {
        toast.classList.add('opacity-0');

        setTimeout(() => {
            toast.classList.add('hidden');
        }, 300);

    }, 2500);
}

function fetchData() {
    const search = searchInput.value;
    const status = statusFilter.value;

    showToast("Updating...", false);

    const url = `{{ route('fishermen.index') }}?search=${encodeURIComponent(search)}&status=${encodeURIComponent(status)}`;

    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error("Network error");
        return res.text();
    })
    .then(html => {
        tableBody.innerHTML = html;
        showToast("Updated successfully");
    })
    .catch(() => {
        showToast("Something went wrong");
    });
}

/* LIVE SEARCH (debounced) */
searchInput.addEventListener('input', () => {
    clearTimeout(typingTimer);

    typingTimer = setTimeout(() => {
        fetchData();
    }, 500);
});

/* FILTER */
statusFilter.addEventListener('change', fetchData);
</script>






<script>
    let selectedFishermanId = null;

    function openDeleteModal(id) {
        selectedFishermanId = id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        selectedFishermanId = null;
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    function confirmDelete() {
        if (!selectedFishermanId) return;

        const form = document.getElementById('deleteForm');
        form.action = `/fishermen/${selectedFishermanId}`;
        form.submit();
    }
</script>




