@extends('layouts.nav')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center items-center bg-gray-100 py-10">

        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-md p-10 border border-gray-200">
            <h1 class="text-3xl font-bold text-red-600 mb-2 text-center">Welcome Back</h1>
            <p class="text-center text-gray-600 mb-8">Log in to continue exploring the Demon Compendium</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                    @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                    @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2 text-gray-700">
                        <input type="checkbox" name="remember" class="text-red-600 border-gray-300 rounded">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-red-600 hover:underline">Forgot
                            password?</a>
                    @endif
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition"
                    >
                        Log In
                    </button>
                </div>
            </form>

            <!-- Register -->
            <div class="mt-8 text-center text-sm text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-red-600 hover:underline">Register here</a>
            </div>
        </div>

    </div>
@endsection
