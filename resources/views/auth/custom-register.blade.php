@extends('layouts.nav')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center items-center bg-gray-100 py-10">

        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-md p-10 border border-gray-200">
            <h1 class="text-3xl font-bold text-red-600 mb-2 text-center">Create Your Account</h1>
            <p class="text-center text-gray-600 mb-8">Join the Demon Compendium to add and explore new entries</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                    @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
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
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                    @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm
                        Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition"
                    >
                        Register
                    </button>
                </div>
            </form>

            <!-- Already registered -->
            <div class="mt-8 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-red-600 hover:underline">Log in here</a>
            </div>
        </div>

    </div>
@endsection
