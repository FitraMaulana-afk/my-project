<nav class="py-4 w-full bg-transparent lg:flex justify-center hidden">
    <div class="container px-10">
        <div class="w-full justify-between flex items-center text-white ">
            <div>
                <h2 class="text-4xl font-bold">Ayo<span class="">Dolan</span></h2>
                <p class="-mt-[10px] font-bold text-gray-300 text-xs ml-10">Dolan Dolan</p>
            </div>
            <div class="flex items-center uppercase font-semibold text-white text-sm">
                <ul class="flex items-center  gap-8">
                    <li class="text-white hover:text-primaryBlue transition ease-in-out"><a
                            href="{{ route('landing.home') }}">Home</a>
                    </li>

                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="text-white hover:text-primaryBlue transition ease-in-out flex items-center uppercase"
                        type="button">Destination
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden rounded-lg w-44">
                        <ul class="py-2 text-sm text-gray-700 ml-3 items-center justify-center flex flex-col dark:text-gray-200"
                            aria-labelledby="dropdownHoverButton">
                            {{-- <li>
                                <a href="#"
                                    class="block px-4 py-2 text-white hover:text-primaryBlue transition ease-in-out">Dashboard</a>
                            </li> --}}
                            @foreach ($countries as $country)
                                <button id="dropdownDefaultButton{{ $country->id }}"
                                    data-dropdown-toggle="dropdown{{ $country->id }}"
                                    class="text-white my-1 hover:text-primaryBlue transition ease-in-out flex items-center justify-between  w-28 uppercase"
                                    type="button">{{ $country->name }}
                                    <i class="fa-solid fa-chevron-right ml-3 text-xs"></i>
                                    </svg>
                                </button>
                            @endforeach
                        </ul>
                    </div>


                    @foreach ($countries as $country)
                        <div id="dropdown{{ $country->id }}" class="z-10 relative  w-96 hidden rounded-lg">
                            <ul class="text-sm text-white -top-8 dark:text-gray-200 w-full absolute left-64"
                                aria-labelledby="dropdownHoverButton{{ $country->id }}">
                                @foreach ($country->provincies as $province)
                                    <li>
                                        <a href="{{ route('landing.province', [$province->slug, $province->id]) }}"
                                            class="block px-4 py-1  hover:text-primaryBlue transition ease-in-out ">{{ $province->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach


                    <li class="text-white hover:text-primaryBlue transition ease-in-out"><a href="#about-me">About</a>
                    </li>
                    <li class="text-white hover:text-primaryBlue transition ease-in-out"><a
                            href="{{ route('landing.contact-me.index') }}">Contact</a>
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
