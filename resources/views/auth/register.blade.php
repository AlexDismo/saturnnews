@extends('layouts.base', ['title' => 'Register'])

@section('content')
    <div class="w-full max-w-xs m-auto mt-6">
        <form novalidate class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text"  placeholder="Name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error("email") border-red-500 @enderror" id="email" type="email" placeholder="Email" required>

                @error('email')
                    <p class="text-yellow-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error("password") border-red-500 @enderror" id="password" type="password" placeholder="******************" required>
                <p class="text-yellow-500 text-xs italic">Please choose a password.</p>

                @error('password')
                <p class="text-yellow-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password confirmation
                </label>
                <input name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error("password_confirmation") border-red-500 @enderror" id="password" type="password" placeholder="******************" required>
                <p class="text-yellow-500 text-xs italic">Confirm a password.</p>

                @error('password_confirmation')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>
            <div class="flex items-center justify-between">
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Register
                </button>
            </div>
            <a href="{{route('loginView')}}" class="inline-block align-baseline text-sm text-yellow-400 hover:text-yellow-800 mt-2">
                Login
            </a>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Laravel blog
        </p>
    </div>
@endsection
