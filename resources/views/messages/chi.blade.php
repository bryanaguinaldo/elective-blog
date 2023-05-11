@extends('layout.base')

@extends('layout.base')

@section('content')
    <!-- Content Div -->
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="flex flex-col w-full h-full bg-white rounded shadow p-4 justify-between">
            <!-- User info -->
            <div class="flex h-max w-full justify-between border-b-2 pb-4">
                <div class="flex items-center">
                    <div class="w-[45px] h-[45px] aspect-square bg-cover bg-red-500 rounded-full"
                        style="background-image: url(/assets/images/sirchavez.jpg)"></div>
                    <div class="mx-4">
                        <div class="font-bold text-[14px] md:text-base">RJ Chavez</div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-lime-500 rounded-full"></div>
                            <div class="text-lime-500 text-[14px] md:text-base ml-1">Online</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Messages -->
            <div class="flex flex-col lg:px-4">
                <div class="bg-gray-200 w-4/6 h-max py-2 px-3 rounded my-4 break-words lg:text-lg">
                    Use this space to evaluate me/our subject. You can say whatever you want to say. Be honest 😠
                </div>
                <div class="bg-indigo-900 w-4/6 h-max py-2 px-3 rounded self-end text-white mb-8 break-words lg:text-lg">
                    <p>
                    Hello Sir RJ, I want to thank you for a fruitful stay here in BulSU. Your classes are fun and very educational, I am grateful for your effort in trying to make every class interesting as much as possible. Although we prefer not to go to class whenever possible we still looked forward to go to your classes whenever there is one. One of the most important things I learned was Chunking, because I have been using this as a way to become more efficient in performing my tasks 🥴. Once again, we thank you for giving us one of the best experiences here in BulSU!
                    </p>
                    <p>- John Matthew Chi</p>
                </div>
                <input class="rounded-xl h-[46px] border-2 border-gray-300 bg-gray-100 w-full p-2" disabled
                    placeholder="You cannot reply to this conversation" />
            </div>
        </div>
    </div>
@endsection
