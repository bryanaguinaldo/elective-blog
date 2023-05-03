@extends('layout.base')

@section('content')
    <div class="w-[90%] md:w-[80%] h-max mt-[16px] mx-[5%] md:mx-[10%]">
        <!-- Cover photo -->
        <div class="w-full h-[180px] md:h-[256px] rounded bg-cover"
            style="background-image: url(https://picsum.photos/1980/300)">
            <div class="flex flex-col w-full h-full rounded bg-black bg-opacity-75">
                <!-- Settings btn -->
                <a href="#" class="flex justify-end p-4 text-white"><i class="fa-solid fa-cog"></i></a>
                <!-- Profile photo -->
                <div
                    class="flex translate-y-20 w-[100px] md:w-[190px] h-[100px] md:h-[190px] rounded-full bg-red-500 ml-6 border-4 md:border-8 border-white drop-shadow-lg items-end justify-end">
                    <!-- Edit profile photo btn -->
                    <button class="w-[40px] h-[40px] bg-white rounded-full drop-shadow-lg">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- User info -->
        <div class="mt-20 mx-6">
            <p class="font-bold text-[18px] md:text-[32px]">{{ $user->first_name . ' ' . $user->last_name }} </p>
            <p class="text-neutral-500 text-[14px] md:text-base">{{ '@' . $user->username }}</p>
            <p class="mt-4 text-[14px] md:text-base">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus
                vel facilisis.
            </p>
            <p class="mt-4 text-neutral-500 text-[14px] md:text-base">
                <i class="fa-solid fa-location-dot"></i> Malolos, Bulacan, Philippines
            </p>
        </div>
        <!-- Create post btn -->
        <div class="mt-4 mx-6 w-max h-max">
            <button data-modal-target="createpost-modal" data-modal-toggle="createpost-modal"
                class="block w-max md:w-[256px] md:h-[48px] text-[14px] md:text-base font-bold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center"
                type="button">
                Create Post
            </button>
            <!-- Create post modal -->
            <div id="createpost-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-7xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Create post</h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="createpost-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Wawooo wihoo wahoooo Wawooo wihoo wahoooo Wawooo wihoo wahoooo Wawooo wihoo wahoooo Wawooo
                                wihoo
                                wahoooo Wawooo wihoo wahoooo Wawooo wihoo wahoooo Wawooo wihoo wahoooo Wawooo wihoo wahoooo
                                Wawooo
                                wihoo wahoooo Wawooo wihoo wahoooo
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="createpost-modal" type="button"
                                class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Post
                            </button>
                            <button data-modal-hide="createpost-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User posts -->
        <div class="flex flex-col items-center mt-8 mx-6">
            <!-- Post 1 -->
            <div class="w-full lg:w-[690px] h-max bg-white drop-shadow-lg p-4 mb-4">
                <!-- User -->
                <div class="flex items-center">
                    <div class="w-[40px] h-[40px] bg-cover bg-red-500 rounded-full"></div>
                    <div class="mx-4">
                        <div class="font-bold text-[14px] md:text-base">Bryan Lorem E. Ipsum</div>
                        <div class="text-neutral-500 text-[14px] md:text-base">69 minutes ago</div>
                    </div>
                </div>
                <!-- Title + Caption + Pic -->
                <div class="flex flex-col mt-4">
                    <p class="text-[18px] md:text-xl font-bold">Sachi the Duck</p>
                    <p class="mt-2 text-[14px] md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip
                        ex ea commodo consequat.
                    </p>
                    <div class="w-full h-[300px] mt-4 bg-red-500 bg-cover"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
