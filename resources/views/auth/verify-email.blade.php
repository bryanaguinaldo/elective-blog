@extends('layout.auth.base')

@section('content')
    <div class="main grid grid-cols-12 w-full h-screen">
        <!-- Left -->
        <div class="hidden lg:block lg:col-span-6 h-full"
            style="background-image: url('{{ asset('assets/images/' . $image['picture']) }}'); background-size: cover">
            <div class="w-full h-full bg-black bg-opacity-75">
                <div class="flex flex-col w-full h-full px-4 pb-10 text-white text-center justify-end">
                    <h3 class="font-bold text-[32px]">{{ $title }}</h3>
                    <p>
                        {{ $description }}
                    </p>
                    <p class="text-gray-500 mt-2">
                        Photo by: {{ $image['taken_by'] }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Right -->
        <div class="col-span-12 lg:col-span-6 flex flex-col h-full bg-white px-12 xl:px-24 justify-center">
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <h2 class="font-bold text-[20px] md:text-[32px]">Email Verification</h2>
                <p class="text-xs md:text-base">We have sent an email to {{ Auth::user()->email }}</p>
                <p class="text-xs md:text-base">Please verify your account to continue.</p>
                <br>
                <p class="text-xs md:text-base">Did not receive an email?</p>
                <p><input type="submit" class="cursor-pointer text-indigo-900 text-xs md:text-base"
                        value="Click here to resend" /></p>
            </form>
        </div>
    </div>
@endsection
