<x-app-layout>

<div class="max-w-xl mx-auto bg-white p-6 rounded-2xl">

<h2 class="text-2xl mb-4">Edit Category</h2>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <input type="text"
        name="name"
        value="{{ $category->name }}"
        class="w-full border p-3 rounded-xl mb-4">

    <button class="bg-[#6f4e37] text-white px-5 py-3 rounded-xl">
        Update
    </button>

</form>

</div>

</x-app-layout>
