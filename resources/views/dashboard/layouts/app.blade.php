@props([
    'title' => '',
    'header' => '',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tailwind Css --}}
    @vite('resources/css/app.css')

    {{-- Poppins Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Poppins&family=Roboto&display=swap"
        rel="stylesheet">

    {{-- Fontawsome Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ $title }}</title>
</head>

<body class=" font-poppins bg-gray-100">
    <x-dashboard.navbar />
    <div class="w-full h-auto flex justify-between ">
        <x-dashboard.sidebar />
        <div class="flex flex-col md:ml-10 lg:ml-[370px] mt-[120px] md:mr-10 w-full">
            <div class="font-bold text-xl">
                {{ $header }}
            </div>
            <div class="w-full bg-white h-auto shadow-xl py-8 px-6 my-8   rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('assets/js/confirm-alert.js') }}"></script>
</body>

</html>
