<x-landing.base title="Home">
    <div class="h-[350px] bg-cover bg-center w-full  z-0  bg-no-repeat "
        style="background-image: url('{{ asset('storage/' . $destination->province->image) }}');">
        <div class=" w-full ">
            <x-landing.navbar />
        </div>
        <div class="flex flex-col w-full h-full items-center justify-center">
            <h1 class="text-4xl font-bold text-white" data-aos="zoom-in-up" data-aos-duration="1000">
                {{ $destination->province->name }}</h1>
            <h4 class="text-gray-200 text-center" data-aos="zoom-in-up" data-aos-duration="1300">
                {{ $destination->country->name }} -
                {{ $destination->province->name }} - {{ $destination->title }}</h4>
        </div>
    </div>

    <div class="container my-8 lg:px-28">
        <h1 class="text-2xl font-bold my-4">{{ $destination->title }}</h1>
        <div class="flex ">
            <p class="float-left">
                <img src="{{ asset('storage/' . $destination->image) }}"
                    class="md:h-96 rounded-xl ml-3 mb-3 float-right" alt="{{ $destination->title }}">
                {{ $destination->description }}
            </p>
        </div>

    </div>
</x-landing.base>
