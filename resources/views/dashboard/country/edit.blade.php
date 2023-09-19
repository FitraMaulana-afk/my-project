<x-dashboard.app title="Dashboard | Country" header="Dashboard / Country / Edit">
    <div>
        <form action="{{ route('dashboard.country.update', $country->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dashboard.country._form')
        </form>
    </div>
</x-dashboard.app>
