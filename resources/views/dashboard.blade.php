<x-app-layout>

    <div class="min-h-[80vh] flex items-center justify-center">
        <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl p-10">

            <!-- HEADER -->
            <div class="text-center mb-10">

                <h1 class="text-5xl font-bold text-[#6f4e37] mb-4">
                    Welcome Back!
                </h1>

                <p class="text-lg text-gray-500">
                    You are successfully logged into your Product Catalog System.
                </p>

            </div>

            <!-- 📊 STATS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">

                <!-- Total Products -->
                <div class="bg-[#f8f3ea] rounded-3xl p-6 text-center shadow-md">
                    <h3 class="text-gray-500 text-sm">Total Products</h3>
                    <p class="text-3xl font-bold text-[#6f4e37]">
                        {{ $totalProducts }}
                    </p>
                </div>

                <!-- Categories -->
                <div class="bg-[#fff8e7] rounded-3xl p-6 text-center shadow-md">
                    <h3 class="text-gray-500 text-sm">Categories</h3>
                    <p class="text-3xl font-bold text-[#6f4e37]">
                        {{ $totalCategories }}
                    </p>
                </div>

                <!-- Active -->
                <div class="bg-green-50 rounded-3xl p-6 text-center shadow-md">
                    <h3 class="text-gray-500 text-sm">Active</h3>
                    <p class="text-3xl font-bold text-green-600">
                        {{ $activeProducts }}
                    </p>
                </div>

                <!-- Out of Stock -->
                <div class="bg-red-50 rounded-3xl p-6 text-center shadow-md">
                    <h3 class="text-gray-500 text-sm">Out of Stock</h3>
                    <p class="text-3xl font-bold text-red-500">
                        {{ $outOfStock }}
                    </p>
                </div>

                <!-- Low Stock -->
                <div class="bg-yellow-50 rounded-3xl p-6 text-center shadow-md">
                    <h3 class="text-gray-500 text-sm">Low Stock</h3>
                    <p class="text-3xl font-bold text-yellow-600">
                        {{ $lowStock }}
                    </p>
                </div>

            </div>



            <!-- 🆕 RECENT PRODUCTS -->
<div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

    <h2 class="text-2xl font-bold text-[#6f4e37] mb-6">
        Recent Products
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-[#f8f3ea] text-[#4b3621]">
                <tr>
                    <th class="px-4 py-3 text-left">Product</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-left">Qty</th>
                    <th class="px-4 py-3 text-left">Created</th>
                    <th class="px-4 py-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($recentProducts as $product)

                    <tr class="border-b hover:bg-[#f8f3ea]">

                        <td class="px-4 py-3 font-semibold">
                            {{ $product->name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $product->category->name ?? 'No Category' }}
                        </td>

                        <td class="px-4 py-3">
                            Rs. {{ $product->price }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $product->qty }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ $product->created_at->format('Y-m-d') }}
                        </td>

                        <td class="px-4 py-3">

                            @if($product->qty == 0)
                                <span class="text-red-600 font-semibold">Out</span>

                            @elseif($product->qty <= 5)
                                <span class="text-yellow-600 font-semibold">Low</span>

                            @else
                                <span class="text-green-600 font-semibold">In Stock</span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            No recent products found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>









            <!-- QUICK ACTIONS -->
            <div class="grid md:grid-cols-2 gap-6">

                <!-- PRODUCT MANAGEMENT -->
                <div class="bg-[#f8f3ea] rounded-3xl p-8 shadow-md hover:shadow-xl transition duration-300">

                    <h2 class="text-2xl font-bold text-[#6f4e37] mb-2">
                        Product Management
                    </h2>

                    <p class="text-gray-600">
                        Create, edit, update, and manage your products easily.
                    </p>

                    <a href="{{ route('product.index') }}"
                       class="inline-block mt-4 bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-lg transition">
                        Go to Products
                    </a>

                </div>

                <!-- QUICK ADD -->
                <div class="bg-[#fff8e7] rounded-3xl p-8 shadow-md hover:shadow-xl transition duration-300">

                    <h2 class="text-2xl font-bold text-[#6f4e37] mb-2">
                        Quick Access
                    </h2>

                    <p class="text-gray-600">
                        Add new products quickly and keep your catalog updated.
                    </p>

                    <a href="{{ route('product.create') }}"
                       class="inline-block mt-4 bg-[#d2b48c] hover:bg-[#c19a6b] text-[#4b3621] px-6 py-3 rounded-2xl shadow-lg transition">
                        Add New Product
                    </a>

                </div>

                <!-- CATEGORY MANAGEMENT -->
<div class="bg-[#f4efe6] rounded-3xl p-8 shadow-md hover:shadow-xl transition duration-300">

    <h2 class="text-2xl font-bold text-[#6f4e37] mb-2">
        Category Management
    </h2>

    <p class="text-gray-600">
        Create and organize product categories easily.
    </p>

    <a href="{{ route('categories.index') }}"
       class="inline-block mt-4 bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-lg transition">

        Go to Categories

    </a>

</div>

            </div>

        </div>
    </div>

</x-app-layout>
