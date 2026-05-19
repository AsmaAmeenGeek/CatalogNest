<x-app-layout>

<div class="max-w-xl mx-auto bg-white p-6 rounded-2xl">

<h2 class="text-2xl mb-4">Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <input type="text"
        name="name"
        placeholder="Category Name"
        class="w-full border p-3 rounded-xl mb-4">

    <textarea
            name="description"
            placeholder="Category Description"
            class="w-full border p-3 rounded-xl mb-4"></textarea>

    <button class="bg-[#6f4e37] text-white px-5 py-3 rounded-xl">
        Save
    </button>

</form>

</div>

</x-app-layout>
