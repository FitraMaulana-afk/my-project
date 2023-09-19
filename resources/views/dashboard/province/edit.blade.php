<x-dashboard.app title="Dashboard | Province" header="Dashboard / Province / Edit">
    <div>
        <form action="{{ route('dashboard.province.update', $province->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dashboard.province._form')
        </form>
    </div>

</x-dashboard.app>
