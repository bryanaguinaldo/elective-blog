@extends('layout.base')

@section('subhead')
    <link rel="stylesheet" href="{{ asset('assets/css/cropper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/form-range.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}" />
@endsection

@section('content')
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="grid grid-cols-12 xl:gap-6 w-max-full">
            <div class="col-span-12 xl:col-span-7 h-max">
                <!-- Cover photo -->
                <div class="w-full h-[180px] h-[180px] md:h-[256px] rounded bg-cover"
                    style="background-image: url(https://picsum.photos/1980/300)">
                    <div class="flex flex-col w-full h-full rounded bg-black bg-opacity-75">
                        <!-- Settings btn -->
                        <a class="flex justify-end p-4 text-white opacity-0"><i class="fa-solid fa-cog"></i></a>
                        <!-- Profile photo -->
                        <div class="flex translate-y-16 md:translate-y-20 w-[120px] md:w-[190px] h-[120px] md:h-[190px] rounded-full bg-black ml-6 border-4 md:border-8 border-white drop-shadow-lg items-end justify-end"
                            style="background-image: url('{{ asset('storage/static/images') . '/' . $user->profile_picture }}'); background-size: cover">
                            <!-- Edit profile photo btn -->
                            @if (Auth::user()->username == $user->username)
                                <form id="image-upload" method="POST">
                                    @csrf
                                    <input type="file" id="dp-file-upload" accept="image/*,image/heif,image/heic"
                                        name="image" hidden>
                                </form>
                                <button data-modal-target="changedp-modal" data-modal-toggle="changedp-modal"
                                    id="show-changedp-modal" hidden></button>
                                <button class="w-[40px] h-[40px] bg-white rounded-full drop-shadow-lg change-dp p-auto"
                                    id="change-dp-button">
                                    <i class="fa-solid fa-camera"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- User info -->
                <div class="mt-16 md:mt-20 mx-6">
                    <div class="flex items-center space-x-2">
                        <p class="font-bold text-[18px] md:text-[32px]">{{ $user->first_name . ' ' . $user->last_name }}
                        </p>
                        @if ($user->verified == 1)
                            <img src="{{ asset('assets/images/verified.svg') }}" class="h-6 w-6" />
                        @elseif ($user->verified == 2)
                            <img src="{{ asset('assets/images/amogus.png') }}" class="h-6 w-6" />
                        @endif
                    </div>
                    <p class="text-neutral-500 text-[14px] md:text-base">{{ '@' . $user->username }}</p>
                    <p class="mt-4 mb-4 text-[14px] md:text-base">
                        {{ $user->description }}
                    </p>
                    {{-- <p class="text-neutral-500 text-[14px] md:text-base">
                <i class="fa-solid fa-location-dot"></i> Malolos, Bulacan, Philippines
            </p> --}}
                </div>
                <!-- Create post btn -->
                @if (Auth::user()->username == $user->username)
                    <div class="mt-4 mx-6 w-max h-max mb-8">
                        <button data-modal-target="createpost-modal" data-modal-toggle="createpost-modal"
                            class="block w-max md:w-[256px] md:h-[48px] text-[14px] md:text-base font-bold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center"
                            type="button">
                            Create Post
                        </button>
                    </div>
                @endif
                <div class="post_data">
                    @include('profile-data')
                </div>
            </div>
            <!-- Other users -->
            <div class="row-start-1 col-span-12 xl:row-auto xl:flex lg:flex-col xl:col-span-5 w-full">
                <div class="xl:sticky top-10">
                    <div class="relative w-full mb-4">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-neutral-500">
                            <i class="fa-solid fa-search mt-1"></i>
                        </div>
                        <input type="text" id="search" autocomplete="off" data-dropdown-placement="bottom"
                            class="bg-white border border-neutral-300 text-neutral-500 text-sm rounded focus:ring-indigo-900 focus:border-indigo-900 block w-full pl-10 p-4"
                            placeholder="Search by username" />
                    </div>
                    <!-- Search dropdown -->
                    <div class="relative w-full">
                        <div id="dropdownUsers" class="z-10 hidden bg-white rounded-lg shadow w-full h-fit absolute">
                            <ul class="w-full py-2 text-gray-700 search-results h-fit"
                                aria-labelledby="dropdownUsersButton">
                                <span class="w-full flex justify-center">No results found.</span>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden xl:block mb-4">
                        <p class="text-[18px] md:text-xl font-bold">Check out other users</p>
                    </div>
                    @foreach ($others as $other)
                        <div class="hidden xl:block w-full h-max bg-white rounded shadow p-4 mb-4">
                            <div class="flex flex-col w-full">
                                <!-- User and view profile btn -->
                                <div class="flex w-full justify-between">
                                    <div class="flex items-center">
                                        <div class="w-[40px] h-[40px] aspect-square bg-cover bg-black rounded-full"
                                            style="background-image: url('{{ asset('storage/static/images') . '/' . $other->profile_picture }}'); background-size: cover">
                                        </div>
                                        <div class="mx-4">
                                            <div class="flex space-x-2 items-center font-bold text-[14px] md:text-base">
                                                {{ $other->first_name . ' ' . $other->last_name }}
                                                @if ($other->verified == 1)
                                                    <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
                                                @elseif ($other->verified == 2)
                                                <img src="{{ asset('assets/images/amogus.png') }}" class="ml-2 h-4 w-4" />
                                                @endif
                                            </div>
                                            <div class="text-neutral-500 text-[14px] md:text-base">
                                                {{ '@' . $other->username }}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('profile', ['username' => $other->username]) }}">
                                        <button
                                            class="block w-max h-max text-[14px] md:text-base font-bold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center">
                                            <span class="text-sm">View profile</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Create post modal -->
    @if (Auth::user()->username == $user->username)
        <div id="createpost-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t">
                        <h3 class="text-lg font-bold text-gray-900">Create Post</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="createpost-modal">
                            <i class="flex fa-solid fa-x w-5 h-5 items-center justify-center"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="createpost-form">
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="grid md:grid-cols-12 md:px-6 space-y-2 md:space-y-0 md:space-x-6">
                                <input type="file" id="cp-fi" accept="image/*,image/heif,image/heic" name="photo"
                                    hidden />
                                <button
                                    class="xcjsddc group md:col-span-5 lg:col-span-3 flex flex-col items-center justify-center text-lg aspect-square bg-cover text-neutral-500 font-bold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded"
                                    style="background-image: url('{{ asset('assets/images/add-image.png') }}')">
                                    <div
                                        class="flex w-full h-full text-white font-medium items-center justify-center group-hover:bg-black opacity-50 focus:bg-black">
                                        <i class="hidden group-hover:flex focus:flex fa-solid fa-pen"></i>
                                        <p class="hidden group-hover:flex focus:flex ml-2">Change Image</p>
                                    </div>
                                </button>
                                <div class="md:col-span-7 lg:col-span-9 flex flex-col">
                                    <input id="create-title"
                                        class="mb-2 p-2 h-[56px] text-lg bg-neutral-200 text-neutral-500 rounded focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        placeholder="Enter blog title" name="title" />
                                    <span class="validation-error error-title text-red-500">
                                        {{ $errors->first('title') }}</span>
                                    <textarea id="create-description"
                                        class="p-2 h-full text-lg bg-neutral-200 text-neutral-500 mt-2 md:mt-4 border-none rounded focus:ring-4 focus:outline-none focus:ring-blue-300 resize-none"
                                        placeholder="Add a description" name="content"></textarea>
                                    <span class="validation-error error-content text-red-500">
                                        {{ $errors->first('content') }} </span>
                                    <span class="validation-error error-photo text-red-500">
                                        {{ $errors->first('photo') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" id="createpost-submit"
                                class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-[180px] py-2.5 text-center">
                                Post
                            </button>
                            <button data-modal-hide="createpost-modal" type="button" id="createpost-cancel"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium w-[180px] py-2.5 hover:text-gray-900 focus:z-10">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <!-- Edit post modal -->
    <div id="editpost-modal" tabindex="-1" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t">
                    <h3 class="text-lg font-bold text-gray-900">Edit Post</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="editpost-modal">
                        <i class="flex fa-solid fa-x w-5 h-5 items-center justify-center"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST" id="editpost-form">
                    @csrf
                    <input type="text" id="epidxcnds" hidden />
                    <div class="p-6 space-y-6">
                        <div class="grid md:grid-cols-12 md:px-6 space-y-2 md:space-y-0 md:space-x-6">
                            <input type="file" id="ep-fi" accept="image/*,image/heif,image/heic" name="photo"
                                hidden />
                            <button
                                class="edfvbf group md:col-span-5 lg:col-span-3 flex flex-col items-center justify-center text-lg aspect-square bg-cover text-neutral-500 font-bold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded"
                                style="background-image: url('{{ asset('assets/images/add-image.png') }}')">
                                <div
                                    class="flex w-full h-full text-white font-medium items-center justify-center group-hover:bg-black opacity-50 focus:bg-black">
                                    <i class="hidden group-hover:flex focus:flex fa-solid fa-pen"></i>
                                    <p class="hidden group-hover:flex focus:flex ml-2">Change Image</p>
                                </div>
                            </button>

                            <div class="md:col-span-7 lg:col-span-9 flex flex-col">
                                <input id="edit-title" name="title"
                                    class="p-2 mb-2 h-[56px] text-lg bg-neutral-200 text-neutral-500 rounded focus:ring-4 focus:outline-none focus:ring-blue-300"
                                    placeholder="Enter blog title" />
                                <span class="validation-error error-title text-red-500">
                                    {{ $errors->first('title') }}</span>
                                <textarea id="edit-description" name="content"
                                    class="p-2 h-full text-lg bg-neutral-200 text-neutral-500 mt-2 md:mt-4 border-none rounded focus:ring-4 focus:outline-none focus:ring-blue-300 resize-none"
                                    placeholder="Add a description"></textarea>
                                <span class="validation-error error-content text-red-500">
                                    {{ $errors->first('content') }} </span>
                                <span class="validation-error error-photo text-red-500">
                                    {{ $errors->first('photo') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-[180px] py-2.5 text-center">
                            Post
                        </button>
                        <button data-modal-hide="editpost-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium w-[180px] py-2.5 hover:text-gray-900 focus:z-10">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="changedp-modal" tabindex="-1" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t">
                    <h3 class="text-lg font-bold text-gray-900">Change Profile Picture</h3>
                    <button type="button" id="x-dismiss-modal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="changedp-modal">
                        <i class="flex fa-solid fa-x w-5 h-5 items-center justify-center"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 changedp-modal-body">
                    <div class="image-darken max-h-96">
                        <img src="" class="rounded-lg" id="change-picture-preview">
                    </div>
                    <div class="flex justify-center">
                        <div class="w-72 mt-4">
                            <div id="zoom-level-slider"></div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-target="confirmdp-modal" data-modal-toggle="confirmdp-modal"
                        id="upload-cropped-image" type="button"
                        class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-[180px] py-2.5 text-center">
                        Update
                    </button>
                    <button data-modal-hide="changedp-modal" type="button" id="cancel-dismiss-modal"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium w-[180px] py-2.5 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="confirmdp-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="confirmdp-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" stroke="currentColor"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 9C9 5.49997 14.5 5.5 14.5 9C14.5 11.5 12 10.9999 12 13.9999" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 18.01L12.01 17.9989" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">
                        Would you like to confirm the change of your profile picture?
                    </h3>
                    <button type="button"
                        class="confirm-cropped-upload text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Confirm
                    </button>
                    <button data-modal-hide="confirmdp-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if ($user->id == Auth::user()->id)
        <!-- Delete modal -->
        <div id="confirmdelete-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="confirmdelete-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this post?</h3>
                        <form action="{{ route('post.destroy') }}" method="POST">
                            @csrf
                            <input type="text" id="post_id" name="post_id" hidden>
                            <button type=submit
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Confirm
                            </button>
                            <button data-modal-hide="confirmdelete-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Error modal -->
    <button id="show-error-modal" data-modal-toggle="error-modal"></button>
    <div id="error-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="error-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 error-message-modal"></h3>
                    <button data-modal-hide="error-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/cropper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-cropper.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function showDropdown() {
                var dropdownUsers = document.getElementById("dropdownUsers");

                if (dropdownUsers.classList.contains("hidden")) {
                    dropdownUsers.classList.remove("hidden");
                    dropdownUsers.classList.add("block");
                }
                document.addEventListener("click", function handleClickOutsideBox(event) {
                    const search = document.getElementById("search");
                    if (!search.contains(event.target)) {
                        dropdownUsers.classList.remove("block");
                        dropdownUsers.classList.add("hidden");
                    }
                });
            }

            $("#search").click(function(e) {
                showDropdown()
            });

            const evt = new Event("DOMContentLoaded", {
                bubbles: true,
                cancelable: false
            });
            document.dispatchEvent(evt);

            function fetch_data(page) {
                $.ajax({
                    type: "get",
                    url: "?page=" + page,
                }).done(function(data) {
                    if (data.data == "") {
                        return;
                    }
                    $(".post_data").append(data.data);
                });
            }

            var page = 1;
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    fetch_data(page);
                    initDropdowns()
                }
            });


            let editor1;
            let editor2;

            ClassicEditor
                .create(document.querySelector('#create-description'), {
                    toolbar: ['bold', 'italic'],
                }).then(newEditor => {
                    editor1 = newEditor
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#edit-description'), {
                    toolbar: ['bold', 'italic'],
                }).then(newEditor => {
                    editor2 = newEditor
                })
                .catch(error => {
                    console.error(error);
                });


            $("button#post-see-more").on("click", function(e) {
                e.preventDefault()
                let id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "/post/" + id,
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#post-name").text(response.name);
                        $("#post-time").text(response.time);
                        $("#post-title").text(response.title);
                        $("#post-content").text(response.content);
                        $("#post-image").attr("src", response.photo);
                    }
                });
            });

            var rangeSlider = document.getElementById('zoom-level-slider');

            noUiSlider.create(rangeSlider, {
                start: [0],
                step: 0.001,
                connect: [true, false],
                range: {
                    'min': [0],
                    'max': [1.6667]
                }
            });

            function isLoading(i) {
                if (i == 0) {
                    $("#createpost-submit").html("Submit");
                    $("#createpost-submit").removeAttrr("disabled");

                } else {
                    $("#createpost-submit").html(
                        '<svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/></svg>'
                    )
                    $("#createpost-submit").attr("disabled");
                }
            }

            function isChangeDpModalLoading(i) {
                if (i == 0) {
                    // $("#createpost-submit").html("Submit");
                    // $("#createpost-submit").removeAttrr("disabled");
                } else {
                    $(".changedp-modal-body").html(
                        '<svg aria-hidden="true" role="status" class="inline w-[50px] h-[50px] flex items-center mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#000"/></svg>'
                    )
                }
            }
            $("#createpost-form").submit(function(e) {
                e.preventDefault();
                isLoading(1)
                let form = document.getElementById("createpost-form")
                let fd = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('post.store') }}",
                    data: fd,
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        location.href =
                            "{{ route('profile', ['username' => Auth::user()->username]) }}"
                        isLoading(0)
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $('#createpost-form').find('span.validation-error').text('');
                            $.each(errors, function(s, v) {
                                $('#createpost-form').find('span.error-' + s).text(v[
                                    0]);
                            });
                        }
                        isLoading(0)
                    }
                });
            });

            $("#editpost-form").submit(function(e) {
                e.preventDefault();
                isLoading(1)
                let form = document.getElementById("editpost-form")
                let fd = new FormData(form);
                let id = $("#epidxcnds").val();
                $.ajax({
                    type: "POST",
                    url: "/update/post/" + id,
                    data: fd,
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        location.href =
                            "{{ route('profile', ['username' => Auth::user()->username]) }}"
                        isLoading(0)
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $('#editpost-form').find('span.validation-error').text('');
                            $.each(errors, function(s, v) {
                                $('#editpost-form').find('span.error-' + s).text(v[
                                    0]);
                            });
                        }
                        isLoading(0)
                    }
                });
            });

            $("#close-view-modal").on("click", function() {
                $("#post-name").text("");
                $("#post-time").text("");
                $("#post-title").text("");
                $("#post-content").text("");
                $("#post-image").attr("src", "");
            });

            $(".xcjsddc").click(function(e) {
                e.preventDefault();
                $("#cp-fi").click();
            });

            $(".edfvbf").click(function(e) {
                e.preventDefault();
                $("#ep-fi").click();
            });

            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).css("background-image", "url('" + e.target.result + "')")
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#cp-fi").change(function(e) {
                e.preventDefault();

                readURL(this, ".xcjsddc");
            });

            $("#ep-fi").change(function(e) {
                e.preventDefault();

                readURL(this, ".edfvbf");
            });

            $("#createpost-cancel").click(function(e) {
                e.preventDefault();
                $("#create-title").val(null);
                $("#create-description").val(null);
                $("#cp-fi").val(null);
                $(".xcjsddc").css("background-image", "url('{{ asset('assets/images/add-image.png') }}')")
            });

            $(".change-dp").click(function(e) {
                e.preventDefault();
                $("#dp-file-upload").click();
            });

            $("button#delete_post").on('click', function(e) {
                e.preventDefault();
                $val = $(this).data('id')
                $("#post_id").val($val);
                console.log($val)
            });

            $("button#edit_post").on('click', function(e) {
                e.preventDefault();
                let dataid = $(this).data("id");
                $("#epidxcnds").val(dataid);
                $.ajax({
                    type: "POST",
                    url: "{{ route('post.edit') }}",
                    data: {
                        post_id: dataid
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#edit_trigger").trigger("click");
                        $("#edit-title").val(response.title);
                        editor2.setData(response.content)
                        $("button.edfvbf").css('background-image',
                            'url("/storage/static/uploaded/' + response.photo + '")');
                    }
                });
            });

            var typingTimer;
            var doneTypingInterval = 500;
            var $input = $("#search");

            $input.on('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            $input.on('keydown', function() {
                clearTimeout(typingTimer);
            });

            function doneTyping() {
                var val = $("#search").val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('search') }}",
                    data: {
                        value: val
                    },
                    dataType: "json",
                }).done(function(data) {
                    if (!data) {
                        $(".search-results").text("No results found.");
                        $(".search-results").addClass("flex justify-center");
                    } else {
                        $(".search-results").html(data);
                        $(".search-results").removeClass("flex justify-center");
                    }
                });
            }

            $("#dp-file-upload").off().change(function(e) {
                e.preventDefault();
                console.log('test2')
                $(".change-dp").html(
                    '<svg aria-hidden="true" role="status" class="m-auto w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#000"/></svg>'
                )
                $("#change-dp-button").attr("disabled", true);
                let form = document.getElementById("image-upload")
                let fd = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('image.store') }}",
                    data: fd,
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(".change-dp").html(
                            '<i class="fa-solid fa-camera"></i>'
                        )
                        $("#change-dp-button").removeAttr("disabled");
                        if (response.status == 1) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('image.show') }}",
                                data: {
                                    submit: true
                                },
                                dataType: "json",
                                success: function(response) {
                                    $("#show-changedp-modal").trigger("click");
                                    $("#change-picture-preview").attr("src",
                                        response.location);
                                    var $image = $('#change-picture-preview');

                                    $image.cropper({
                                        aspectRatio: 1 / 1,
                                        dragMode: 'move',
                                        viewMode: 1,
                                        autoCropArea: 1,
                                        responsive: true,
                                        restore: false,
                                        guides: false,
                                        center: false,
                                        highlight: false,
                                        cropBoxMovable: false,
                                        cropBoxResizable: false,
                                        toggleDragModeOnDblclick: false,
                                        zoomOnWheel: false,
                                        ready: function() {
                                            // var canvasData = $image.cropper('getCanvasData');
                                            var cropBoxData = $image
                                                .cropper(
                                                    'getCropBoxData');
                                            var imageData = $image
                                                .cropper(
                                                    'getImageData');

                                            rangeSlider.noUiSlider
                                                .updateOptions({
                                                    range: {
                                                        'min': imageData
                                                            .width /
                                                            imageData
                                                            .naturalWidth,
                                                        'max': 1.667,
                                                    }
                                                });

                                            rangeSlider.noUiSlider.set([
                                                imageData
                                                .width /
                                                imageData
                                                .naturalWidth
                                            ]);

                                            rangeSlider.noUiSlider.on(
                                                'slide',
                                                function() {
                                                    $image.cropper(
                                                        'zoomTo',
                                                        rangeSlider
                                                        .noUiSlider
                                                        .get());
                                                });

                                            $(window).resize(
                                                function() {
                                                    if (window
                                                        .innerWidth <
                                                        1023) {
                                                        rangeSlider
                                                            .noUiSlider
                                                            .updateOptions({
                                                                range: {
                                                                    'min': $(
                                                                            ".cropper-crop-box"
                                                                        )
                                                                        .width() /
                                                                        imageData
                                                                        .naturalWidth,
                                                                    'max': 1.667,
                                                                }
                                                            });
                                                    } else {
                                                        rangeSlider
                                                            .noUiSlider
                                                            .updateOptions({
                                                                range: {
                                                                    'min': imageData
                                                                        .width /
                                                                        imageData
                                                                        .naturalWidth,
                                                                    'max': 1.667,
                                                                }
                                                            });
                                                    }
                                                });
                                        },
                                    });

                                    var cropper = $image.data('cropper');
                                    $("#upload-cropped-image").click(function(e) {
                                        e.preventDefault();

                                        $(".confirm-cropped-uppload")
                                            .trigger('click');;
                                        $(".confirm-cropped-upload").off()
                                            .click(function(e) {
                                                $image.cropper(
                                                    "getCroppedCanvas"
                                                ).toBlob((
                                                    blob) => {
                                                    const
                                                        formData =
                                                        new FormData();
                                                    formData
                                                        .append(
                                                            'image',
                                                            blob
                                                        );

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "{{ route('image.update') }}",
                                                        data: formData,
                                                        dataType: "json",
                                                        cache: false,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function(
                                                            response
                                                        ) {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{ route('image.destroy') }}",
                                                                data: {
                                                                    submit: true
                                                                },
                                                                dataType: "json",
                                                            });
                                                            window
                                                                .location
                                                                .href =
                                                                '{{ route('profile', ['username' => $user->username]) }}'
                                                        }
                                                    });
                                                });
                                            });
                                    });

                                    $("#x-dismiss-modal, #cancel-dismiss-modal")
                                        .click(function(e) {
                                            $("#dp-file-upload")
                                                .val(null);
                                            $("#change-picture-preview")
                                                .removeAttr("src");
                                            $image.cropper(
                                                "destroy");
                                            $.ajax({
                                                type: "POST",
                                                url: "{{ route('image.destroy') }}",
                                                data: {
                                                    submit: true
                                                },
                                                dataType: "json",
                                                success: function(
                                                    response
                                                ) {
                                                    rangeSlider
                                                        .noUiSlider
                                                        .reset();
                                                },
                                            });
                                        });
                                }
                            });
                        }
                    },
                    error: function(xhr, response) {
                        $(".change-dp").html(
                            '<i class="fa-solid fa-camera"></i>'
                        )
                        $(".change-dp").removeAttr("disabled");
                        if (xhr.status == 422) {
                            var data = xhr.responseJSON;
                            $("#show-error-modal").trigger("click");
                            $("#dp-file-upload").val(null);
                            $(".error-message-modal").text(data.message)
                        }
                    }
                });
            });
        });
    </script>
@endsection
