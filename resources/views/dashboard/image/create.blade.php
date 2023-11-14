<x-dashboard.app title="Dashboard | Image" header="Dashboard / Image / Create">
    <form action="{{ route('dashboard.image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.image._form')
    </form>
</x-dashboard.app>
