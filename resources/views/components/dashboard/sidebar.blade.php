<div id="mobile-menu"
    class="min-h-screen w-0 lg:flex  -ml-40 lg:ml-6 transition-all ease-in-out duration-150 flex-col  mb-8 lg:my-8 lg:w-[300px] z-30  lg:mx-6 fixed lg:rounded-lg bg-white shadow-xl ">
    <div class="lg:hidden flex w-full items-center justify-between">
        <div class="px-4 py-2 mx-6 my-6">
            <a href="" class="flex items-center">
                <img src="{{ asset('assets/dashboard/logo/Logo.png') }}" class="md:w-10 w-14" alt="" srcset="">
                <p class="md:text-lg text-2xl font-semibold text-primabg-primaryOrange">Tukuo Shop</p>
            </a>
        </div>
        <button id="close-toggle" class="px-4 py-2 mx-6 my-4">
            <i class="fa-solid fa-xmark text-2xl text-primabg-primaryOrange"></i>
        </button>
    </div>
    <div class="w-full hidden lg:flex justify-center my-10">
        <a href="" class="flex items-center">
            <img src="{{ asset('assets/dashboard/logo/Logo.png') }}" class="md:w-10 w-14" alt="" srcset="">
            <p class="md:text-lg text-2xl font-semibold text-primabg-primaryOrange">Ayo Dolan</p>
        </a>
    </div>
    <div class="flex flex-col mx-6 overflow-y-auto h-[300px] ">
        <ul class="">
            <li
                class="font-semibold text-dark flex items-center hover:text-white hover:bg-primaryOrange transition-all ease-in-out py-4 px-6 rounded-lg duration-150">
                <a class="flex items-center text-center" href="{{ route('dashboard.dashboard') }}"> <i
                        class="fa-solid fa-house mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="">
            <li
                class="font-semibold text-dark flex items-center hover:text-white hover:bg-primaryOrange transition-all ease-in-out py-4 px-6 rounded-lg duration-150">
                <a class="flex items-center text-center" href="{{ route('dashboard.province.index') }}"><i
                        class="fa-solid fa-tree mr-4"></i>
                    <span>Province</span>
                </a>
            </li>
        </ul>

    </div>

    <div class="mx-6 mt-10" class="w-full">
        <div
            class="  font-semibold text-dark hover:text-white hover:bg-primaryOrange transition-all ease-in-out py-4 px-6 rounded-lg duration-150">
            <a class="flex"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                href="#">
                <form action="{{ route('dashboard.logout') }}" method="POST" class="flex" id="logout-form">
                    @csrf
                    <div class="">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <span class="ml-4 font-semibold">Log out</span>
                </form>
            </a>
        </div>
    </div>
</div>
