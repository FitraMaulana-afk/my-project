<x-dashboard.app title="Dashboard | Destination" header="Dashboard / Destination / Create">
    <form action="{{ route('dashboard.destination.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.destination._form')
    </form>
</x-dashboard.app>
