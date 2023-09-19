<x-dashboard.app title="Dashboard | Country" header="Dashboard / Country / Create">
    <div>
        <form action="{{ route('dashboard.country.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('dashboard.country._form')
        </form>
    </div>
</x-dashboard.app>
