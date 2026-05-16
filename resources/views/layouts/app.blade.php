<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Product Catalog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f3ea] text-[#4b3621] min-h-screen">

<!-- nav items -->
<nav class="bg-[#6f4e37] shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- logo name -->
        <a href="{{ route('dashboard') }}"
           class="text-2xl font-bold text-[#fff8e7]">
            CatalogNest
        </a>


        <div class="flex items-center gap-4">

            <a href="{{ route('product.create') }}"
               class="bg-[#fff8e7] text-[#6f4e37] px-4 py-2 rounded-xl hover:bg-yellow-100 transition shadow">
                Add Product
            </a>

            <div class="relative" x-data="{ open: false }">

                <button @click="open = !open"
                        class="text-[#fff8e7] font-medium hover:text-yellow-200 flex items-center gap-1">

                    {{ Auth::user()->name }}

                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                              clip-rule="evenodd"/>
                    </svg>

                </button>


                <div x-show="open"
                     @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg overflow-hidden z-50">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>

<main class="max-w-7xl mx-auto px-6 py-8">
    {{ $slot }}
</main>

</body>

</html>

