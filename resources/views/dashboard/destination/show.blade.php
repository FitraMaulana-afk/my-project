<x-dashboard.app title="Dashboard | Destination" header="Dashboard / Destination / Show">
    <form method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.destination._form')
    </form>
</x-dashboard.app>
