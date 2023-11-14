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
            <form action="{{ route('landing.search') }}" method="get" class="flex">
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
        <div class="container lg:flex block justify-between py-20 lg:px-10">

            <div class="lg:w-1/4" data-aos="fade-right" data-aos-duration="800">
                <h2 class="uppercase font-bold text-4xl text-center lg:text-left">
                    About
                </h2>
                <p class="font-semibold text-gray-500 ml-0.5 text-sm  text-center lg:text-left">
                    Ayo Dolan
                </p>
            </div>
            <div class="lg:w-1/2" data-aos="fade-left" data-aos-duration="800">
                <p class="text-lg">
                    Ayo Dolan is a travel blog dedicated to travelers seeking real experiences around the world, from
                    road trips in Japan, Hokkaido, to deserts on the West Coast of the United States and Namibia.
                    Travelers who want to explore the world passionately, in a responsible and open-minded way. And of
                    course, fellow Indonesians who want to explore more of their own country. Yuki is a writer with a
                    strong passion for writing and editing, social media, and photography. In 2023, she decided to
                    create "Ayo Dolan" to share her journeys. Actually, it all started after her first travel article
                    was published in Maxim Indonesia magazine. She has won several awards for her writing from 2015 up
                    to the present. She is still open to writing assignments for airline magazines and travel companies.
                    Her favorite writings were published in National Geographic Traveler in 2016 and Koran Kompas in
                    2017. You can see her complete portfolio here.
                </p>

            </div>
        </div>
        <div class="contanier">
            <div class="border-t-2 border-black  flex flex-col items-center justify-center mx-0 lg:mx-20 py-10">
                <h4 class="font-semibold text-2xl">Follow My Social Media</h4>
                <div class="flex items-center gap-4 mt-4">
                    <a href=""><i class="fa-brands fa-facebook text-2xl"></i></a>
                    <a href=""><i class="fa-brands fa-youtube text-2xl"></i></a>
                    <a href=""><i class="fa-brands fa-twitter text-2xl"></i></a>
                    <a href=""><i class="fa-brands fa-instagram text-2xl"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="h-[600px] bg-cover bg-center w-full z-20 bg-no-repeat "
        style="background-image: url('{{ asset('assets/image/background2.jpg') }}');">
        <div class=" w-full h-full flex-col flex items-center justify-center gap-8">
            <p class="text-sm text-white  text-center" data-aos="zoom-in-up" data-aos-duration="600">
                explore the world
                with me</p>
            <h1 class="text-6xl font-extrabold uppercase text-white" data-aos="zoom-in-up" data-aos-duration="900">
                Destination</h1>
            <a data-aos="zoom-in-up" data-aos-duration="1200" href="{{ route('destination.index') }}"
                class="px-6 py-2 border-white font-bold hover:shadow-xl shadow-sm hover:px-[26px] hover:py-[10px] border-2 text-white hover:border-primaryBlue hover:text-primaryBlue ease-in-out transition-all duration-300 rounded">Take
                Me There</a>
        </div>
    </div>
    <div class="w-full px-12 min-h-screen z-40 py-20 bg-white ">
        <h1 class="text-center font-bold uppercase text-2xl">My lastest Advanture</h1>
        <h1 class="text-center font-bold my-5 text-gray-500 tracking-wide text-sm">travel guides, stories and tips from
            the
            road</h1>
        <div class="border-primaryBlue w-48 mx-auto my-2 border-2"></div>
        <div class="container mt-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                @foreach ($destinations as $destination)
                    <a href="{{ route('destination.show', $destination->slug) }}">
                        <div class="rounded-md ">
                            <div class="h-[180px] w-full overflow-hidden rounded-lg">
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}"
                                    class="rounded-lg h-[180px] w-full hover:brightness-50 transition-all ease-in-out duration-300 hover:scale-110">
                            </div>
                            <h2
                                class="text-xl font-bold mt-4 hover:text-blue-500 transition-all ease-in-out duration-150">
                                {{ $destination->title }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-landing.base>
