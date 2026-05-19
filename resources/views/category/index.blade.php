<x-app-layout>

    <div class="flex justify-between items-center mb-8">

        <div>
            <h2 class="text-4xl font-bold text-[#6f4e37]">
                Categories
            </h2>

            <p class="text-gray-500 mt-1">
                Manage product categories
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
            class="bg-[#6f4e37] hover:bg-[#5a3d2b] text-white px-6 py-3 rounded-2xl shadow-lg transition">
            <span class="text-2xl font-bold leading-none">+</span>
            <span>Add Category</span>
        </a>

    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-[#d2b48c] text-[#4b3621]">
                <tr>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Created</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr class="border-b hover:bg-[#f8f3ea]">

                    <td class="p-4 font-semibold">
                        {{ $category->name }}
                    </td>

                    <td class="p-4 text-gray-500">
                        {{ $category->created_at->format('Y-m-d') }}
                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-3">

                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="bg-[#d2b48c] hover:bg-[#c19a6b] text-[#4b3621] px-4 py-2 rounded-xl shadow transition">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure?')">

                                @csrf
                                @method('DELETE')

                                <button class="bg-[#e07a7a] hover:bg-[#c96565] text-white px-4 py-2 rounded-xl shadow transition">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="3" class="text-center p-6 text-gray-500">
                        No categories found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>
