<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f8f3ea] px-4">

        <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8">

            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold text-[#6f4e37] mb-2">
                    Welcome Back!!
                </h1>

                <p class="text-gray-500">
                    Login to Product Catalog
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4 text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
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
                        autofocus
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
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2 text-red-500"
                    />

                </div>


                <div class="flex items-center mb-6">

                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-[#6f4e37] focus:ring-[#d2b48c]"
                        name="remember"
                    >

                    <label for="remember_me" class="ms-2 text-sm text-gray-600">
                        Remember me
                    </label>

                </div>


                <button
                    type="submit"
                    class="w-full bg-[#6f4e37] hover:bg-[#5a3d2b] text-white font-semibold py-3 rounded-xl transition duration-300 shadow-md"
                >
                    Log In
                </button>


                <div class="flex justify-between items-center mt-6 text-sm">

                    @if (Route::has('password.request'))

                        <a
                            class="text-gray-500 hover:text-[#6f4e37] transition"
                            href="{{ route('password.request') }}"
                        >
                            Forgot Password?
                        </a>

                    @endif

                    <a
                        href="{{ route('register') }}"
                        class="text-[#6f4e37] font-semibold hover:underline"
                    >
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
