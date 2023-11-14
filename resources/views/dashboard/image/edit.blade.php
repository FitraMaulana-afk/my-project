<x-dashboard.app title="Dashboard | Image" header="Dashboard / Image / Edit">
    <form action="{{ route('dashboard.image.update', $image->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('dashboard.image._form')
    </form>
</x-dashboard.app>
