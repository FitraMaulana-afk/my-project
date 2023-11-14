<x-landing.base title="Home">
    <div class="h-[600px] bg-cover bg-center w-full fixed z-0  bg-no-repeat "
        style="background-image: url('{{ asset('assets/image/background.jpg') }}');">
        <div class=" w-full ">
            <x-landing.navbar />
        </div>
        <div class="w-full h-full flex flex-col items-center justify-center ">
            <h4 class="text-center font-bold text-2xl text-white" data-aos="zoom-in-up" data-aos-duration="800">Welcome To
                My
                Website</h4>
            <p class="text-white text-sm mt-5 mb-3">Find a Your Favorite Content</p>
            <form action="{{ route('landing.home') }}" method="get" class="flex">
                <input type="search" placeholder="Find Here" class="opacity-50 rounded-l-full w-[600px]" name="search"
                    id="search" value="">
                <button type="submit"
                    class="bg-gray-500/50 rounded-r-full hover:bg-gray-800/75 transition-all ease-in-out duration-150 px-5 ">
                    <i class="fa-solid fa-search text-white"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="w-full px-12  z-20 mt-[600px] bg-white " id="about-me">
        <div class="w-full px-12 min-h-screen z-40 py-20 bg-white ">
            <h1 class="text-center font-bold uppercase text-2xl">My lastest Advanture</h1>
            <h1 class="text-center font-bold my-5 text-gray-500 tracking-wide text-sm">travel guides, stories and tips
                from
                the
                road</h1>
            <div class="border-primaryBlue w-48 mx-auto my-2 border-2"></div>
            <div class="container mt-4 w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full gap-6 mt-4">
                    @forelse ($destinations as $destination)
                        <a href="{{ route('destination.show', $destination->slug) }}">
                            <div class="rounded-md ">
                                <div class="h-[180px] w-full overflow-hidden rounded-lg">
                                    <img src="{{ asset('storage/' . $destination->image) }}"
                                        alt="{{ $destination->title }}"
                                        class="rounded-lg h-[180px] w-full hover:brightness-50 transition-all ease-in-out duration-300 hover:scale-110">
                                </div>
                                <h2
                                    class="text-xl font-bold mt-4 hover:text-blue-500 transition-all ease-in-out duration-150">
                                    {{ $destination->title }}</h2>
                            </div>
                        </a>
                    @empty
                </div>
                <div class="w-full flex items-center justify-center py-20">
                    <h2 class="uppercase text-center text-gray-600 font-bold text-6xl">Not Found</h2>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-landing.base>
