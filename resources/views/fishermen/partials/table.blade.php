@forelse($fishermen as $fisherman)

<tr class="transition hover:bg-gray-50">

    <td class="px-6 py-5">
        <h3 class="font-semibold text-gray-800">
            {{ $fisherman->full_name }}
        </h3>
        <p class="mt-1 text-xs text-gray-400">
            ID #{{ str_pad($fisherman->id, 3, '0', STR_PAD_LEFT) }}
        </p>
    </td>

    <td class="px-6 py-5 text-sm text-gray-600">
        {{ $fisherman->contact_number ?? 'N/A' }}
    </td>

    <td class="px-6 py-5 text-sm text-gray-600">
        {{ $fisherman->boat_name ?? 'N/A' }}
    </td>

    <td class="px-6 py-5 text-sm text-gray-600">
        {{ $fisherman->address ?? 'N/A' }}
    </td>

    <td class="px-6 py-5">
        @if($fisherman->status == 'active')
            <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                Active
            </span>
        @else
            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                Inactive
            </span>
        @endif
    </td>

    <td class="px-6 py-5">
        <div class="flex items-center justify-center gap-2">

            <a href="{{ route('fishermen.show', $fisherman->id) }}"
               class="rounded-lg bg-blue-50 px-4 py-2 text-xs font-medium text-blue-700 hover:bg-blue-100">
                View
            </a>

            <a href="{{ route('fishermen.edit', $fisherman->id) }}"
               class="rounded-lg bg-blue-50 px-4 py-2 text-xs font-medium text-blue-700 hover:bg-blue-100">
                Edit
            </a>

            <button type="button"
                onclick="openDeleteModal({{ $fisherman->id }})"
                class="rounded-lg bg-red-50 px-4 py-2 text-xs font-medium text-red-700 hover:bg-red-100">
                Delete
            </button>

        </div>
    </td>

</tr>

@empty

<tr>
    <td colspan="6" class="px-6 py-16 text-center text-gray-400">
        No fishermen found
    </td>
</tr>

@endforelse
