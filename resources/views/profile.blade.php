@extends('layout.base')

@section('subhead')
    <title>Resale - Dashboard</title>
    <link href="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/cropper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/form-range.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}" />
@endsection

@section('content')
    <div class="w-[90%] md:w-[80%] h-max mt-[16px] mx-[5%] md:mx-[10%]">
        <!-- Cover photo -->
        <div class="w-full h-[180px] md:h-[256px] rounded bg-cover"
            style="background-image: url(https://picsum.photos/1980/300)">
            <div class="flex flex-col w-full h-full rounded bg-black bg-opacity-75">
                <!-- Settings btn -->
                <a href="#" class="flex justify-end p-4 text-white"><i class="fa-solid fa-cog"></i></a>
                <!-- Profile photo -->
                <div class="flex translate-y-20 w-[100px] md:w-[190px] h-[100px] md:h-[190px] rounded-full bg-black ml-6 border-4 md:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url('{{ asset('storage/static/images') . '/' . $user->profile_picture }}'); background-size: cover">
                    <!-- Edit profile photo btn -->
                    @if (Auth::user()->username == $user->username)
                        <form id="image-upload" method="POST">
                            @csrf
                            <input type="file" id="dp-file-upload" accept="image/*,image/heif,image/heic" name="image"
                                hidden>
                        </form>
                        <button data-modal-target="changedp-modal" data-modal-toggle="changedp-modal"
                            id="show-changedp-modal" hidden></button>
                        <button class="w-[40px] h-[40px] bg-white rounded-full drop-shadow-lg change-dp">
                            <i class="fa-solid fa-camera"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <!-- User info -->
        <div class="mt-20 mx-6">
            <div class="flex items-center space-x-2">
                <p class="font-bold text-[18px] md:text-[32px]">{{ $user->first_name . ' ' . $user->last_name }} </p>
                @if ($user->verified == 1)
                    <img src="{{ asset('assets/images/verified.svg') }}" class="h-6 w-6" />
                @endif
            </div>
            <p class="text-neutral-500 text-[14px] md:text-base">{{ '@' . $user->username }}</p>
            <p class="mt-4 text-[14px] md:text-base">
                {{ $user->description }}
            </p>
            {{-- <p class="mt-4 text-neutral-500 text-[14px] md:text-base">
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
        @foreach ($user->posts->reverse() as $post)
            <!-- Post -->
            <div class="flex flex-col items-center mb-2 mx-6">
                <!-- Post 1 -->
                <div class="w-full lg:w-[690px] h-max bg-white drop-shadow-lg p-4 mb-2">
                    <!-- User -->
                    <div class="flex w-full justify-between">
                        <div class="flex items-center">
                            <div class="w-[40px] h-[40px] aspect-square bg-cover bg-red-500 rounded-full"
                                style="background-image: url('{{ asset('storage/static/images') . '/' . $user->profile_picture }}')">
                            </div>
                            <div class="mx-4">
                                <div class="flex items-center font-bold text-[14px] md:text-base">
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                    @if ($user->verified == 1)
                                        <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
                                    @endif
                                </div>
                                <div class="text-neutral-500 text-[14px] md:text-base">
                                    {{ \Carbon\Carbon::now()->subDays(7) >= \Carbon\Carbon::parse($post->created_at) ? $post->created_at->format('F d, Y') : $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        @if ($user->id == Auth::user()->id)
                            <!-- Menu Dropdown -->
                            <button id="dropdownMenuButton" data-dropdown-toggle="menu-dropdown"
                                class="flex justify-end p-4 text-neutral-500 hover:bg-gray-200 hover:text-gray-900 rounded outline-none"
                                type="button">
                                <i class="fa-solid fa-ellipsis-h"></i>
                            </button>
                            <!-- User dropdown component -->
                            <div id="menu-dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="#" data-modal-target="editpost-modal"
                                            data-modal-toggle="editpost-modal" class="block px-4 py-2 hover:bg-gray-100"
                                            type="button"><i class="fa-solid fa-edit"></i> Edit post</a>
                                    </li>
                                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                        @csrf
                                        <li>
                                            <button type="submit"
                                                class="block px-4 py-2 text-red-600 hover:bg-gray-100 w-full"><i
                                                    class="fa-solid fa-trash-can"></i> Delete post</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- Title + Caption + Pic -->
                    <div class="flex flex-col mt-4">
                        <p class="text-[18px] md:text-xl font-bold">{{ $post->title }}</p>
                        <p class="mt-2 text-[14px] md:text-base break-words">
                            {{ $post->content }}
                        </p>
                        @if ($post->photo != null)
                            <a href="{{ route('post.show', ['id' => $post->id]) }}" id="post-see-more"
                                class="w-full mt-4 aspect-square bg-cover"
                                style="background-image: url('{{ asset('storage/static/uploaded' . '/' . $post->photo) }}')"></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
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
                                <!-- <button</button> -->
                                {{-- <button
                            class="md:col-span-5 lg:col-span-3 flex flex-col items-center justify-center text-lg aspect-square bg-neutral-200 text-neutral-500 font-bold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded">
                            <i class="flex fa-solid fa-file-image text-2xl"></i><span>Add Image</span>
                        </button> --}}
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
                                        class="p-2 h-[56px] text-lg bg-neutral-200 text-neutral-500 rounded focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        placeholder="Enter blog title" name="title" />
                                    <span class="validation-error error-title text-red-500"> {{ $errors->first('title') }}
                                    </span>
                                    <textarea id="create-description"
                                        class="p-2 h-full text-lg bg-neutral-200 text-neutral-500 mt-2 md:mt-4 border-none rounded focus:ring-4 focus:outline-none focus:ring-blue-300 resize-none"
                                        placeholder="Add a description" name="content"></textarea>
                                    <span class="validation-error error-content text-red-500">
                                        {{ $errors->first('content') }} </span>
                                    <span class="validation-error error-photo text-red-500"> {{ $errors->first('photo') }}
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
    <div id="editpost-modal" tabindex="-1"
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
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-12 md:px-6 space-y-2 md:space-y-0 md:space-x-6">
                        <button
                            class="group md:col-span-5 lg:col-span-3 flex flex-col items-center justify-center text-lg aspect-square bg-cover text-neutral-500 font-bold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded"
                            style="background-image: url(/src/images/duck.jpg)">
                            <div
                                class="flex w-full h-full text-white font-medium items-center justify-center group-hover:bg-black opacity-50 focus:bg-black">
                                <i class="hidden group-hover:flex focus:flex fa-solid fa-pen"></i>
                                <p class="hidden group-hover:flex focus:flex ml-2">Change Image</p>
                            </div>
                        </button>

                        <div class="md:col-span-7 lg:col-span-9 flex flex-col">
                            <input
                                class="p-2 h-[56px] text-lg bg-neutral-200 text-neutral-500 rounded focus:ring-4 focus:outline-none focus:ring-blue-300"
                                placeholder="Enter blog title" />
                            <textarea
                                class="p-2 h-full text-lg bg-neutral-200 text-neutral-500 mt-2 md:mt-4 border-none rounded focus:ring-4 focus:outline-none focus:ring-blue-300 resize-none"
                                placeholder="Add a description"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="editpost-modal" type="button"
                        class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-[180px] py-2.5 text-center">
                        Post
                    </button>
                    <button data-modal-hide="editpost-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium w-[180px] py-2.5 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                </div>
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
                    <button type="button" class="confirm-cropped-upload"
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
                        clearSignupForm()
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

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(".xcjsddc").css("background-image", "url('" + e.target.result + "')")
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#cp-fi").change(function(e) {
                e.preventDefault();

                readURL(this);
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

            $("#dp-file-upload").off().change(function(e) {
                e.preventDefault();
                console.log('test2')
                // loading(".change-dp")
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
                        // finishedLoadingUploadButton(".change-dp")
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
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            showModal("#error-modal");
                            $("#dp-file-upload").val(null);
                        }
                    }
                });
            });
        });
    </script>
@endsection
