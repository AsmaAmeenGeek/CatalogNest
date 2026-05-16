<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f8f3ea] px-4">

        <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8">


            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold text-[#6f4e37] mb-2">
                    Create Account
                </h1>

                <p class="text-gray-500">
                    Register Product Catalog
                </p>

            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">

                    <x-input-label
                        for="name"
                        :value="__('Name')"
                        class="text-[#4b3621] font-semibold"
                    />

                    <x-text-input
                        id="name"
                        class="block mt-2 w-full rounded-xl border-gray-300 focus:border-[#d2b48c] focus:ring-[#d2b48c]"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2 text-red-500"
                    />

                </div>


                <div class="mb-5">

                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-[#4b3621] font-semibold"
                    />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl border-gray-300 focus:border-[#d2b48c] focus:ring-[#d2b48c]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2 text-red-500"
                    />

                </div>


                <div class="mb-5">

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-[#4b3621] font-semibold"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl border-gray-300 focus:border-[#d2b48c] focus:ring-[#d2b48c]"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2 text-red-500"
                    />

                </div>


                <div class="mb-6">

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')"
                        class="text-[#4b3621] font-semibold"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl border-gray-300 focus:border-[#d2b48c] focus:ring-[#d2b48c]"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2 text-red-500"
                    />

                </div>


                <button
                    type="submit"
                    class="w-full bg-[#6f4e37] hover:bg-[#5a3d2b] text-white font-semibold py-3 rounded-xl transition duration-300 shadow-md"
                >
                    Register
                </button>


                <div class="text-center mt-6">

                    <a
                        href="{{ route('login') }}"
                        class="text-[#6f4e37] font-semibold hover:underline"
                    >
                        Already registered?
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
