<x-app-layout>

    <div class="min-h-[80vh] flex items-center justify-center">
        <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl p-10">

            <!-- header -->
            <div class="text-center mb-10">

                <h1 class="text-5xl font-bold text-[#6f4e37] mb-4">
                    Welcome Back!
                </h1>

                <p class="text-lg text-gray-500">
                    You are successfully logged into your Product Catalog System.
                </p>

            </div>

            <!-- Stats grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">

                <!-- Total prodcts -->
                <div class="bg-[#f8f3ea] rounded-3xl p-6 text-center shadow-md">
                    <div class="text-5xl mb-3">📦</div>
                    <h3 class="text-gray-500 text-sm">Total Products</h3>
                    <p class="text-3xl font-bold text-[#6f4e37]">
                        {{ $totalProducts }}
                    </p>
                </div>

                <!-- Categories -->
                <div class="bg-[#fff8e7] rounded-3xl p-6 text-center shadow-md">
                    <div class="text-5xl mb-3">🗂️</div>
                    <h3 class="text-gray-500 text-sm">Categories</h3>
                    <p class="text-3xl font-bold text-[#6f4e37]">
                        {{ $totalCategories }}
                    </p>
                </div>

                <!-- Active -->
                <div class="bg-green-50 rounded-3xl p-6 text-center shadow-md">
                    <div class="text-5xl mb-3">✅</div>
                    <h3 class="text-gray-500 text-sm">Active</h3>
                    <p class="text-3xl font-bold text-green-600">
                        {{ $activeProducts }}
                    </p>
                </div>

                <!-- Out of stock -->
                <div class="bg-red-50 rounded-3xl p-6 text-center shadow-md">
                    <div class="text-5xl mb-3">❌</div>
                    <h3 class="text-gray-500 text-sm">Out of Stock</h3>
                    <p class="text-3xl font-bold text-red-500">
                        {{ $outOfStock }}
                    </p>
                </div>

                <!-- Low stock -->
                <div class="bg-yellow-50 rounded-3xl p-6 text-center shadow-md">
                    <div class="text-5xl mb-3">⚠️</div>
                    <h3 class="text-gray-500 text-sm">Low Stock</h3>
                    <p class="text-3xl font-bold text-yellow-600">
                        {{ $lowStock }}
                    </p>
                </div>

            </div>

            <!-- low stck alrt section -->
            <div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-[#6f4e37]">
                        Low Stock Alerts⚠️
                    </h2>

                    <span class="text-sm text-gray-500">
                        Items with quantity ≤ 5
                    </span>

                </div>

                @if($lowStockProducts->count() > 0)

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                    @foreach($lowStockProducts as $product)

                    <div class="border rounded-2xl p-5 bg-yellow-50 shadow-sm hover:shadow-md transition">

                        <div class="flex justify-between items-start">

                            <div>
                                <h3 class="font-bold text-[#6f4e37] text-lg">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>
                            </div>

                            <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $product->qty }} left
                            </span>

                        </div>

                        <p class="text-sm text-gray-600 mt-3">
                            {{ $product->description }}
                        </p>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="text-center py-10 text-gray-500">
                    No low stock products.
                </div>

                @endif

            </div>


            <div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-red-600">
                        Out of Stock Alerts🔴
                    </h2>

                    <span class="text-sm text-gray-500">
                        Items with quantity = 0
                    </span>

                </div>

                @if($outOfStockProducts->count() > 0)

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                    @foreach($outOfStockProducts as $product)

                    <div class="border rounded-2xl p-5 bg-red-50 shadow-sm hover:shadow-md transition">

                        <div class="flex justify-between items-start">

                            <div>
                                <h3 class="font-bold text-[#6f4e37] text-lg">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>
                            </div>

                            <span class="bg-red-200 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">
                                0 left
                            </span>

                        </div>

                        <p class="text-sm text-gray-600 mt-3">
                            {{ $product->description }}
                        </p>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="text-center py-10 text-gray-500">
                    No out of stock products.
                </div>

                @endif

            </div>


            <!-- recently added products list section-->
            <div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold text-[#6f4e37] mb-6">
                    Recent Products📦
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
                                    No recent products found.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- recent activities on system section -->
            <div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold text-[#6f4e37] mb-6">
                    Recent Activity📋
                </h2>

                <div class="space-y-4">

                    @forelse($recentActivities as $activity)

                    <div class="flex justify-between items-center border-b pb-3">

                        <div>
                            <p class="font-semibold text-[#6f4e37]">
                                {{ $activity->message }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Product: {{ $activity->product->name ?? 'Deleted Product' }}
                            </p>
                        </div>

                        <div class="text-right">

                            <p class="text-sm text-gray-600">
                                {{ ucfirst($activity->type) }}
                            </p>

                            <p class="text-xs text-gray-400">
                                {{ $activity->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>

                    @empty

                    <p class="text-center text-gray-500">
                        No activity found
                    </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>
    </div>

</x-app-layout>
