<x-dashboard.app title="Dashboard | Province" header="Dashboard / Province">
    <div class="pb-4">
        <x-button variant="success" :href="route('dashboard.province.create')">
            Add Province
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
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $no = 1;
                @endphp
                @forelse ($provinces as $province)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $no++ }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $province->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap flex">
                            <x-button variant="warning" class="mr-1"
                                href="{{ route('dashboard.province.edit', $province->id) }}">
                                Edit
                            </x-button>
                            <x-button variant="info" class="mr-1"
                                href="{{ route('dashboard.province.show', $province->id) }}">
                                Show
                            </x-button>
                            <form class="flex" action="{{ route('dashboard.province.destroy', $province->id) }}"
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

        @if ($provinces->count() >= 1)
            <x-pagination :paginator="$provinces" />
        @endif
    </div>

</x-dashboard.app>
