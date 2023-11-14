<x-dashboard.app title="Dashboard | Destination" header="Dashboard / Destination">
    <div class="pb-4">
        <x-button variant="success" :href="route('dashboard.destination.create')">
            Add Destination
        </x-button>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        No
                    </th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Publish
                    </th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $no = 1;
                @endphp
                @forelse ($destinations as $destination)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $no++ }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $destination->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            @if ($destination->is_yes)
                                <span
                                    class="px-2 py-1 text-white text-xs bg-green-500 p-2 rounded-full">{{ __('Yes') }}</span>
                            @else
                                <span
                                    class="px-2 py-1 text-white text-xs bg-red-500 p-2 rounded-full">{{ __('No') }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap flex">
                            <x-button variant="warning" class="mr-1"
                                href="{{ route('dashboard.destination.edit', $destination->id) }}">
                                Edit
                            </x-button>
                            <x-button variant="info" class="mr-1"
                                href="{{ route('dashboard.destination.show', $destination->id) }}">
                                Show
                            </x-button>
                            <form class="flex" action="{{ route('dashboard.destination.destroy', $destination->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" class="show_confirm" variant="danger">
                                    Delete
                                </x-button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr class="">
                        <td colspan="3" class="text-center font-semibold text-gray-500 text-xs">No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($destinations->count() >= 1)
            <x-pagination :paginator="$destinations" />
        @endif
    </div>
</x-dashboard.app>
