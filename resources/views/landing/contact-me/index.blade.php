<x-landing.base title="Home">
    <div class="h-screen bg-cover bg-center w-full fixed z-0  bg-no-repeat"
        style="background-image: url('{{ asset('assets/image/background5.jpg') }}');">

    </div>
    <div class="z-30">
        <x-landing.navbar />
        <div class="container flex flex-col items-center py-4">
            <h1 class="text-4xl font-semibold text-white">Have Same <span class="text-blue-500">Question ?</span></h1>
            <p class="text-center text-gray-200 px-40">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Repellendus
                unde
                consequatur,
                culpa autem
                similique non commodi sint ratione dignissimos ipsam!</p>
        </div>

        <div class="lg:flex ">
            <div class="w-3/5 py-10 px-8 mx-20 bg-white/25 my-20 shadow-sm rounded-sm">
                <form action="{{ route('landing.contact-me.send') }}" method="post">
                    @csrf
                    <div class="flex">

                        <div class="w-1/2 mr-4">
                            <x-form.input placeholder="First Name" type="text" name="first_name" id="first_name"
                                class="rounded-none bg-white/50" />
                        </div>
                        <div class="w-1/2">
                            <x-form.input placeholder="Last Name" type="text" name="last_name" id="last_name"
                                class="rounded-none bg-white/50" />
                        </div>
                    </div>
                    <div class="flex my-4">

                        <div class="w-1/2 mr-4">
                            <x-form.input placeholder="Phone" type="number" name="phone" id="phone"
                                class="rounded-none bg-white/50" />
                        </div>
                        <div class="w-1/2">
                            <x-form.input placeholder="Email" type="email" name="email" id="email"
                                class="rounded-none bg-white/50" />
                        </div>
                    </div>
                    <div class="w-full">
                        <x-form.textarea placeholder="Message" name="message" id="message"
                            class="rounded-none bg-white/50" />
                    </div>
                    <div class="mt-4">
                        <x-button variant="info" type="submit">
                            Submit
                        </x-button>
                    </div>
                </form>
            </div>
            <div class="my-24 w-1/4">
                <h4 class="font-semibold text-2xl text-white">Request A Call Back</h4>
                <p class="text-sm text-gray-300">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate
                    amet
                </p>
                <div class="flex flex-col text-white">
                    <div class="flex items-center  mt-2">
                        <i class="fa-solid fa-phone p-3 rounded-full border border-white"></i>
                        <p class="ml-2">+62 822 3298 4829</p>
                    </div>
                    <div class="flex items-center  mt-2">
                        <i class="fa-solid fa-envelope p-3 rounded-full border border-white"></i>
                        <p class="ml-2">maulanafitra1122@gmail.com</p>
                    </div>
                    <div class="flex items-center  mt-2 pb-6 border-b-2">
                        <i class="fa-solid fa-location-dot py-3 px-3.5  rounded-full border border-white"></i>
                        <p class="ml-2">Trenggalek</p>
                    </div>
                    <div class="flex  gap-8 pt-6">
                        <i class="fa-brands fa-facebook p-3 rounded-full border border-white"></i>
                        <i class="fa-brands fa-instagram  p-3 rounded-full border border-white"></i>
                        <i class="fa-brands fa-linkedin p-3 rounded-full border border-white"></i>
                        <i class="fa-brands fa-twitter  p-3 rounded-full border border-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing.base>
