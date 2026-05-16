<x-app-layout>

    <div class="min-h-[80vh] flex items-center justify-center">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-2xl p-10">

            <div class="text-center mb-10">

                <h1 class="text-5xl font-bold text-[#6f4e37] mb-4"> Welcome Back! </h1>

                <p class="text-lg text-gray-500">
                    You are successfully logged into your Product Catalog System.
                </p>

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-[#f8f3ea] rounded-3xl p-8 shadow-md hover:shadow-xl transition duration-300">

                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-[#6f4e37] mb-2">
                            Product Management
                        </h2>

                        <p class="text-gray-600">
                            Create, edit, update, and manage your products easily.
                        </p>
                    </div>

                    <a href="{{ route('product.index') }}"
                       class="inline-block mt-4 bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-lg transition">
                        Go to Products
                    </a>
                </div>

                <div class="bg-[#fff8e7] rounded-3xl p-8 shadow-md hover:shadow-xl transition duration-300">
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-[#6f4e37] mb-2">
                            Quick Access
                        </h2>

                        <p class="text-gray-600">
                            Add new products quickly and keep your catalog updated.
                        </p>
                    </div>

                   <a href="{{ route('product.create') }}" class="inline-block mt-4 bg-[#d2b48c] hover:bg-[#c19a6b] text-[#4b3621] px-6 py-3 rounded-2xl shadow-lg transition">
                     Add New Product
                   </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
