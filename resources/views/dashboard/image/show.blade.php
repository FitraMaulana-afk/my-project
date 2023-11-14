<x-dashboard.app title="Dashboard | Image" header="Dashboard / Image / Show">
    <form>
        @csrf
        @include('dashboard.image._form')
    </form>
</x-dashboard.app>
