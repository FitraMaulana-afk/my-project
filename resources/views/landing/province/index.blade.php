<x-landing.base title="Destination ">
    <div class="h-[350px] bg-cover bg-center w-full   bg-no-repeat "
        style="background-image: url('{{ asset('storage/' . $province->image) }}');">
        <div class=" w-full ">
            <x-landing.navbar />
        </div>
        <div class="flex flex-col w-full h-full items-center justify-center" data-aos="zoom-in-up"
            data-aos-duration="1000">
            <h1 class="text-4xl font-bold text-white">
                {{ $province->name }}
            </h1>
            <p class="text-base text-white text-center">{{ $province->description }}</p>
        </div>
    </div>

    <div class="container ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 my-10">
            @foreach ($destinations as $destination)
                <a href="{{ route('destination.show', $destination->slug) }}">
                    <div class="rounded-md ">
                        <div class="h-[270px] w-full overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}"
                                class="rounded-lg h-[270px] w-full hover:brightness-50 transition-all ease-in-out duration-300 hover:scale-110">
                        </div>
                        <h2 class="text-xl font-bold mt-4">{{ $destination->title }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-landing.base>
