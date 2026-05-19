<x-app-layout>

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl p-8">

            <h2 class="text-4xl font-bold text-[#6f4e37] mb-2"> Edit Product </h2>

            <p class="text-gray-500 mb-8"> Update your product details </p>

            <!-- errors -->
            @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-2xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label class="block text-[#4b3621] font-semibold mb-2"> Product Name </label>
                    <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-[#d2b48c]">
                </div>

                <div class="mb-6">
                    <label class="block text-[#4b3621] font-semibold mb-2"> Description </label>
                    <textarea name="description" rows="5" class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-[#d2b48c]">{{ $product->description }}</textarea>
                </div>

                <div class="mb-8">
                    <label class="block text-[#4b3621] font-semibold mb-2"> Price </label>
                    <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-[#d2b48c]">
                </div>

                <div class="mb-8">
                    <label class="block text-[#4b3621] font-semibold mb-2"> Quantity </label>
                    <input type="number" name="qty" step="0.01" value="{{ $product->qty }}" class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-[#d2b48c]">
                </div>

                <div class="mb-8">
                    <label class="block text-[#4b3621] font-semibold mb-2"> Category </label>

                    <select name="category_id"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-[#d2b48c] focus:border-[#d2b48c] text-gray-500">

                        <option value="">Select Category</option>

                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-8 py-4 rounded-2xl shadow-lg transition"> Update Product </button>
            </form>
        </div>
    </div>
</x-app-layout>
