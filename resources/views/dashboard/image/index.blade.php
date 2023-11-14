<x-dashboard.app title="Dashboard | Image for Destination" header="Dashboard / Image for Destination">
    <div class="pb-4">
        <x-button variant="success" :href="route('dashboard.image.create')">
            Add Image
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
                        Destination
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
                @forelse ($images as $image)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $no++ }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $image->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $image->destination->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap flex">
                            <x-button variant="warning" class="mr-1"
                                href="{{ route('dashboard.image.edit', $image->id) }}">
                                Edit
                            </x-button>
                            <x-button variant="info" class="mr-1"
                                href="{{ route('dashboard.image.show', $image->id) }}">
                                Show
                            </x-button>
                            <form class="flex" action="{{ route('dashboard.image.destroy', $image->id) }}"
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

        @if ($images->count() >= 1)
            <x-pagination :paginator="$images" />
        @endif
    </div>
</x-dashboard.app>
