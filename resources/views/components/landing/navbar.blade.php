<nav class="py-4 w-full bg-transparent lg:flex justify-center hidden">
    <div class="container px-10">
        <div class="w-full justify-between flex items-center text-white ">
            <div>
                <h2 class="text-2xl font-bold">Ayo<span class="">Dolan</span></h2>
                <p class="-mt-[10px] font-bold text-gray-300 text-xs ml-7">Dolan Dolan</p>
            </div>
            <div class="flex items-center uppercase font-semibold text-white text-sm">
                <ul class="flex items-center  gap-8">
                    <li class="text-white hover:text-primaryOrange transition ease-in-out"><a
                            href="{{ route('landing.home') }}">Home</a>
                    </li>
                    <li class="flex flex-col items-center cursor-pointer relative group"><a href=""
                            class="text-white hover:text-primaryBlue transition-all ease-in-out">Destination
                            <i class="ml-2 fa-solid fa-chevron-down"></i></a>
                        <div
                            class="absolute left-0 py-4  w-32  top-full hidden flex-col  md:flex justify-between items-center  bg-transparent   divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible z-30">
                            @foreach ($countries as $country)
                                <div class="flex items-center py-1 w-full justify-between relative group">
                                    <p>{{ $country->name }}</p>
                                    <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                                <div
                                    class="absolute left-0 py-4  w-32  top-full hidden flex-col  md:flex justify-between items-center  bg-transparent   divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible z-30">
                                    @foreach ($country->provincies as $provincy)
                                        {{ $provincy->name }}
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </li>
                    <li class="text-white hover:text-primaryOrange transition ease-in-out"><a href="">Who Are
                            We</a>
                    </li>
                    <li class="text-white hover:text-primaryOrange transition ease-in-out"><a href="">Contact</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="flex gap-4 items-center">
                <a href=""
                    class="bg-primaryOrange font-semibold border-primaryOrange hover:bg-transparent shadow hover:text-primaryOrange border transition-all ease-in-out px-4 py-2 rounded hover:px-5 text-white hover:shadow-lg">Login</a>
                <a href=""
                    class="text-primaryOrange/80 font-semibold hover:text-primaryOrange/100 transition-all ease-in-out">Sign
                    up</a>
            </div> --}}
        </div>
    </div>
</nav>
