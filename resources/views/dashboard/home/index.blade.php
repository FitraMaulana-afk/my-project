<x-dashboard.app title="Dashboard" header="Dashboard" class="">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
        <div class="bg-blue-600 text-white px-4 py-6 rounded-lg mt-4 flex jus">
            <i class="fa-solid fa-map text-5xl mx-2"></i>
            <div class="ml-2">
                <p class="font-bold text-2xl">Destination</p>
                <p class="font-semibold text-lg">{{ $destination }} </p>
            </div>
        </div>
        <div class="bg-red-500 text-white px-4 py-6 rounded-lg mt-4 flex jus">
            <i class="fa-solid fa-location-dot text-5xl mx-2"></i>
            <div class="ml-2">
                <p class="font-bold text-2xl">Country</p>
                <p class="font-semibold text-lg">{{ $country }} </p>
            </div>
        </div>
        <div class="bg-green-500 text-white px-4 py-6 rounded-lg mt-4 flex jus">
            <i class="fa-solid fa-tree text-5xl mx-2"></i>
            <div class="ml-2">
                <p class="font-bold text-2xl">Province</p>
                <p class="font-semibold text-lg">{{ $province }} </p>
            </div>
        </div>
    </div>
</x-dashboard.app>
