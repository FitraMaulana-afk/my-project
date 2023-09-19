<x-dashboard.app title="Dashboard | Province" header="Dashboard / Province / Create">
    <div>
        <form action="{{ route('dashboard.province.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('dashboard.province._form')
        </form>
    </div>

</x-dashboard.app>
