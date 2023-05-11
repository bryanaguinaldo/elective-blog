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
            <div class="flex flex-col lg:px-4 overflow-y-scroll">
                <div class="bg-gray-200 w-4/6 h-max py-2 px-3 rounded my-4 break-words lg:text-lg">
                    Use this space to evaluate me/our subject. You can say whatever you want to say. Be honest 😠
                </div>
                <div class="bg-indigo-900 w-4/6 h-max py-2 px-3 rounded self-end text-white mb-4 break-words lg:text-lg">
                    <p>
                        Dear Mr. [Your Professor's Name]:
                        <br />
                        <br />
                        I would like to express my gratitude for your service as our professor for the subject Elective 4
                        this
                        academic year of 2022 - 2023. You have brought knowledge to our class with most passion and
                        expertise
                        making sure that we learn something from you. Even though you are late most of the time, you make
                        sure
                        that your classes are always something that we'll learn from. Thank you very much Mr. [Your
                        Professor's
                        Name]. I wish you success in your future endeavours.
                        <br />
                        <br />
                        Yours Truly,
                        <br />
                        [Your Name]
                        <br />
                        <br />
                        PS. Ako po nagsulat niyan finormat ko lang as Chat GPT HAHAHAHAHA. Pero for real, thank you po sir!
                        Sa POV
                        ko maraming matututo sa way ng pagtuturo niyo. Kaso late ka po palagi. Sabi mo po 7am pasok tapos
                        dadating
                        po kayo 8am. Chunking tayo next time sir HAHAHAHAHAHAHA jk.
                    </p>
                    <p>- Bryan Aguinaldo</p>
                </div>
                <div class="bg-indigo-900 w-1/2 h-auto p-2 rounded self-end text-white mb-4 break-words lg:text-lg rounded">
                    <img src="/assets/images/quaso.png" />
                </div>
                <div class="bg-indigo-900 w-fit h-auto p-2 rounded self-end text-white mb-8 break-words lg:text-lg rounded">
                    Quaso
                </div>
                <div class="bottom-0 mt-1 sticky bg-white w-full py-4 border-t">
                    <input class="rounded-xl h-[46px] border-2 border-gray-300 bg-gray-100 w-full p-2" disabled
                        placeholder="You cannot reply to this conversation" />
                </div>
            </div>
        </div>
    </div>
@endsection
