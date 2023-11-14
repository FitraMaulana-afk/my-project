<x-dashboard.app title="Dashboard | Destination" header="Dashboard / Destination / Edit">
    <form action="{{ route('dashboard.destination.update', $destination->id) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('dashboard.destination._form')
    </form>
</x-dashboard.app>
