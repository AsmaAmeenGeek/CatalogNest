<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CatalogNest</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f3ea] text-[#4b3621] min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-[#6f4e37] shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <!-- Logo -->
            <div>
                <h1 class="text-3xl font-bold text-[#fff8e7]">
                    CatalogNest
                </h1>
            </div>

            <!-- LOgin,Reg Buttons -->
            <div class="flex items-center gap-4">

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="bg-[#fff8e7] text-[#6f4e37] px-5 py-2 rounded-2xl shadow hover:bg-[#f3e5c8] transition">
                        Dashboard
                    </a>
                @else

                    <a href="{{ route('login') }}"
                       class="text-[#fff8e7] hover:text-[#f3e5c8] transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-[#fff8e7] text-[#6f4e37] px-5 py-2 rounded-2xl shadow hover:bg-[#f3e5c8] transition">
                        Register
                    </a>

                @endauth

            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- LEFT CONTENT -->
            <div>

                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-[#6f4e37]">
                    Smart Product
                    Catalog Management
                </h1>

                <p class="mt-6 text-lg text-[#7c624d] leading-relaxed">
                    CatalogNest helps businesses manage products,
                    inventory, categories, stock status, and product
                    information in one elegant dashboard.
                </p>

                <div class="mt-8 flex gap-4">

                    <a href="{{ route('register') }}"
                       class="bg-[#b08968] hover:bg-[#9c7257] text-white px-7 py-3 rounded-2xl shadow-lg transition">
                        Get Started
                    </a>

                </div>

            </div>

            <!-- Card -->
            <div>
    <div class="bg-white rounded-3xl shadow-2xl p-6 border border-[#eadbc8]">

        <div class="rounded-2xl overflow-hidden shadow-lg border border-[#f0e6d8]">

            <img src="{{ asset('Images/coverImg.png') }}"
                 alt="CatalogNest Cover"
                 class="w-full h-auto object-cover">

        </div>

    </div>
</div>

        </div>

    </section>

    <!-- footer -->
    <footer class="text-center py-8 text-[#7c624d]">
       <b> © {{ date('Y') }} CatalogNest</b> - Product Catalog Management System
    </footer>

</body>
</html>
