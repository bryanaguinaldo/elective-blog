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
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <h2 class="font-bold text-[20px] md:text-[32px]">Email Verification</h2>
                <p class="text-xs md:text-base">We have sent an email to xxx@gmail.com</p>
                <p class="text-xs md:text-base">Please verify your account to continue.</p>
                <br>
                <p class="text-xs md:text-base">Did not receive an email?</p>
                <p><input type="submit" class="cursor-pointer text-indigo-900 text-xs md:text-base"
                        value="Click here to resend" /></p>
            </form>
        </div>
    </div>
@endsection
