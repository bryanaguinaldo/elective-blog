@extends('layout.auth.base')

@section('content')
    <div class="main grid grid-cols-12 w-full h-screen">
        <!-- Left -->
        <div class="hidden lg:block lg:col-span-6 h-full" style="background-image: url('https://picsum.photos/1920/1080')">
            <div class="w-full h-full bg-black bg-opacity-75">
                <div class="flex flex-col w-full h-full px-4 pb-10 text-white text-center justify-end">
                    <h3 class="font-bold text-[32px]">Pagsanjan Falls</h3>
                    <p>
                        Mayon, also known as Mount Mayon and Mayon Volcano, is an active stratovolcano in the province of
                        Albay in
                        Bicol, Philippines. A popular tourist spot, it is renowned for its "perfect cone" because of its
                        symmetric
                        conical shape, and is regarded as very sacred in Philippine mythology.
                    </p>
                </div>
            </div>
        </div>
        <!-- Right -->
        <div class="col-span-12 lg:col-span-6 flex flex-col h-full bg-white px-12 xl:px-24 justify-center">
            <h2 class="font-bold text-[20px] md:text-[32px]">Welcome back!</h2>
            <p class="text-xs md:text-base">Please sign in to your account to continue.</p>
            @if (Session::has('message'))
                <div class="flex flex-col mt-4 md:mt-8 w-full lg:w-5/6">
                    <div
                        class="w-full h-max border {{ Session::get('status') == 0 ? 'border-red-150 bg-red-50' : 'border-green-150 bg-green-50' }} p-2 rounded-md">
                        <p class="font-bold {{ Session::get('status') == 0 ? 'text-red-800' : 'text-green-800' }}">
                            {{ Session::get('title') }}</p>
                        <p class="{{ Session::get('status') == 0 ? 'text-red-800' : 'text-green-800' }}">
                            {{ Session::get('message') }}</p>
                    </div>
                </div>
            @endif
            <form action="{{ route('login.auth') }}" method="POST" class="flex flex-col mt-4 md:mt-8 w-full lg:w-5/6">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block font-bold mb-2 text-xs md:text-base">Username<span
                            class="text-red-600">
                            *</span></label>
                    <input type="text" id="username" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-10">
                    <label for="password" class="block font-bold mb-2 text-xs md:text-base">Password<span
                            class="text-red-600">
                            *</span></label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                </div>
                <button type="submit"
                    class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded w-full sm:w-auto px-5 py-2.5 text-center text-xs md:text-base">
                    Sign in
                </button>
                <p class="mt-1 text-center text-xs md:text-base">
                    Don't have an account? <a href="{{ route('signup') }}" class="text-indigo-900">Sign up.</a>
                </p>
            </form>
        </div>
    </div>
@endsection
