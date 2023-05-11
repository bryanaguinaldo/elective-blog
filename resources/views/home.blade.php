@extends('layout.base')

@section('content')
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="grid grid-cols-12 xl:gap-6 w-max-full">
            <div class="col-span-12 xl:col-span-7 h-max" id="results">
                <div class="mb-4">
                    <p class="text-[18px] md:text-xl font-bold">Feed</p>
                </div>
                <div class="post_data">
                    @include('home-data')
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
                                <span class="flex justify-center">No results found.</span>
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
                                            <div class="font-bold text-[14px] md:text-base">
                                                {{ $other->first_name . ' ' . $other->last_name }}</div>
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

@section('scripts')
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

            function fetch_data(page) {
                $.ajax({
                    type: "get",
                    url: "?page=" + page,
                }).done(function(data) {
                    if (data.data == " ") {
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
    </script>
@endsection
