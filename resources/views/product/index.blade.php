<x-app-layout>

    <div class="flex justify-between items-start mb-8">

        <div>
            <h2 class="text-4xl font-bold text-[#6f4e37]">
                Product Dashboard
            </h2>

            <p class="text-gray-500 mt-1">
                Manage your products easily
            </p>
        </div>

        <a href="{{ route('product.create') }}" class="bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-lg transition">
            <span class="text-2xl font-bold leading-none">+</span>
            <span>Add Product</span>
        </a>

    </div>


    <!-- SEARCH BAR -->
    <div class="mb-6">
        <form action="{{ route('product.index') }}" method="GET" class="flex gap-3">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search products..."
                class="w-full border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#d2b48c] focus:border-[#d2b48c]">

            <button
                type="submit"
                class="bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-md transition">
                Search
            </button>

        </form>
    </div>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow">
        {{ session('success') }}
    </div>
    @endif


    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#d2b48c] text-[#4b3621]">
                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Description</th>
                        <th class="px-6 py-4 text-left">Price (Rs.)</th>
                        <th class="px-6 py-4 text-left">Quantity</th>
                        <th class="px-6 py-4 text-left">Category</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)

                    <tr class="border-b hover:bg-[#f8f3ea] transition duration-200">

                        <td class="px-6 py-5 font-semibold">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-5 text-gray-600">
                            {{ $product->description }}
                        </td>

                        <td class="px-6 py-5 font-medium">
                            {{ $product->price }}
                        </td>

                        <td class="px-6 py-5 font-medium">
                            {{ $product->qty }}
                        </td>

                        <td class="px-6 py-5 font-medium">
                            {{ $product->category->name ?? 'No Category' }}
                        </td>

                        <td class="px-6 py-5">

                            @if($product->qty == 0)

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                🔴 Out of Stock
                            </span>

                            @elseif($product->qty <= 5)

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                ⚠ Low Stock ({{ $product->qty }})
                                </span>

                                @else

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    🟢 In Stock ({{ $product->qty }})
                                </span>

                                @endif

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-center gap-3">

                                <!-- EDIT -->
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="bg-[#d2b48c] hover:bg-[#c19a6b] text-[#4b3621] px-4 py-2 rounded-xl shadow transition"> Edit
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-[#e07a7a] hover:bg-[#c96565] text-white px-4 py-2 rounded-xl shadow transition"> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-12">

                            <h3 class="text-2xl font-semibold text-[#6f4e37] mb-2">
                                No Products Found
                            </h3>

                            <p class="text-gray-500 mb-5">
                                Start by creating your first product.
                            </p>

                            <a href="{{ route('product.create') }}"
                                class="bg-[#6f4e37] text-white px-5 py-3 rounded-xl shadow">
                                Add Product
                            </a>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>
