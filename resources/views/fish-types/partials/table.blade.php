@forelse($fishTypes as $fishType)

    <tr class="transition hover:bg-gray-50">

        <td class="whitespace-nowrap px-6 py-5">
            <div class="font-semibold text-gray-800">
                {{ $fishType->fish_name }}
            </div>

            @if($fishType->description)
                <div class="mt-1 max-w-xs truncate text-sm text-gray-500">
                    {{ $fishType->description }}
                </div>
            @endif
        </td>

        <td class="whitespace-nowrap px-6 py-5 text-sm text-gray-700">
            {{ $fishType->default_buy_price ? '₱' . number_format($fishType->default_buy_price, 2) : 'N/A' }}
        </td>

        <td class="whitespace-nowrap px-6 py-5 text-sm text-gray-700">
            {{ $fishType->default_sell_price ? '₱' . number_format($fishType->default_sell_price, 2) : 'N/A' }}
        </td>

        <td class="whitespace-nowrap px-6 py-5">
            @php
                $profit = $fishType->default_sell_price - $fishType->default_buy_price;
            @endphp

            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                ₱{{ number_format($profit, 2) }}
            </span>
        </td>

        <td class="whitespace-nowrap px-6 py-5 text-sm text-gray-500">
            {{ $fishType->created_at->format('M d, Y') }}
        </td>

        <td class="whitespace-nowrap px-6 py-5 text-right">
            <div class="flex items-center justify-end gap-2">

                <a href="{{ route('fish-types.show', $fishType->id) }}"
                   class="rounded-lg border px-3 py-2 text-xs">
                    View
                </a>

                <a href="{{ route('fish-types.edit', $fishType->id) }}"
                   class="rounded-lg bg-blue-50 px-3 py-2 text-xs text-blue-700">
                    Edit
                </a>

                <form action="{{ route('fish-types.destroy', $fishType->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <!-- DELETE BUTTON -->
<button
    type="button"
    onclick="openDeleteModal('{{ route('fish-types.destroy', $fishType->id) }}')"
    class="rounded-lg bg-red-50 px-3 py-2 text-xs text-red-600 ">

    Delete

</button>
                </form>

            </div>
        </td>

    </tr>

@empty

    <tr>
        <td colspan="6" class="px-6 py-16 text-center text-gray-500">
            No fish types found
        </td>
    </tr>

@endforelse
