<x-landing.base title="Home">
    <div class="h-[600px] bg-cover bg-center w-full fixed z-0  bg-no-repeat "
        style="background-image: url('{{ asset('assets/image/background.jpg') }}');">
        <div class=" w-full ">
            <x-landing.navbar />
        </div>
        <div class="flex w-full h-full items-center justify-center">
            <h1 class="text-4xl font-bold text-white">Sejatine Urip Mung Mampir Dolan</h1>
        </div>
    </div>
    <div class="w-full px-12  z-20 mt-[600px] bg-white ">
        <div class="container lg:flex block justify-between py-20 lg:px-10">
            <div class="lg:w-1/4">
                <h2 class="uppercase font-bold text-4xl text-center lg:text-left">
                    About
                </h2>
                <p class="font-semibold text-gray-500  text-sm  text-center lg:text-left">
                    Ayo Dolan
                </p>
            </div>
            <div class="lg:w-1/2">
                <p class="text-lg">
                    Helter Skelter is a travel blog dedicated to the wanderers who seek real experiences around the
                    world,
                    from road trips in Iceland, Faroe Islands, to the deserts of West Coast US and Namibia.

                    Travellers who want to see the world passionately, with a responsible and open minded way.

                    And of course, fellow Indonesians who want to explore more of their hometown.

                    Yuki is a writer who have a big passion for writing and editing, social media, and photography.

                    In 2013, she decided to create Helter Skelter to share her travel journeys. Well, actually after her
                    first travel article got published in Maxim Indonesia magazine. She won several awards for her
                    writings
                    since 2015 until now. She still open for writing assignment for airline magazine and travel company.

                    Her favourite writings are published in National Geographic Traveler in 2016 and Koran Kompas in
                    2017.
                    See here for the complete portfolio.
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
            <p class="text-sm text-white  text-center">explore the world with me</p>
            <h1 class="text-6xl font-extrabold uppercase text-white">Destination</h1>
            <a href=""
                class="px-6 py-2 border-white font-bold hover:shadow-xl shadow-sm hover:px-[26px] hover:py-[10px] border-2 text-white hover:border-primaryBlue hover:text-primaryBlue ease-in-out transition-all rounded">Take
                Me There</a>
        </div>
    </div>
    <div class="w-full px-12 min-h-screen z-40 py-20 bg-white ">
        <div class="container">
            <h1 class="text-center font-bold uppercase text-2xl">My lastest Advanture</h1>
        </div>
    </div>
</x-landing.base>
