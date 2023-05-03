@extends('layout.auth.base')

@section('content')
    <div class="main grid grid-cols-12 w-full h-screen">
        <!-- Left -->
        <!-- style="background-image: url('https://picsum.photos/1920/1080')" -->
        <div class="hidden lg:block lg:col-span-6 h-full">
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
            <h2 class="font-bold text-[20px] md:text-[32px]">Get started</h2>
            <p class="text-xs md:text-base">Don't wait any longer - create your account today.</p>
            <form action="{{ route('register') }}" method="POST" id="signup_form"
                class="flex flex-col mt-4 md:mt-8 w-full lg:w-5/6">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="block font-bold mb-2 text-xs md:text-base">First Name<span
                            class="text-red-600">
                            *</span></label>
                    <input type="text" id="first_name" name="first_name"
                        class="capitalize bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                    <span class="validation-error error-first_name text-red-500">{{ $errors->first('first_name') }}</span>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block font-bold mb-2 text-xs md:text-base">Last Name<span
                            class="text-red-600">
                            *</span></label>
                    <input type="text" id="last_name" name="last_name"
                        class="capitalize bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                    <span class="validation-error error-last_name text-red-500">{{ $errors->first('last_name') }}</span>
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-bold mb-2 text-xs md:text-base">Email<span class="text-red-600">
                            *</span></label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                    <span class="validation-error error-email text-red-500">{{ $errors->first('email') }}</span>
                </div>
                <div class="mb-4">
                    <label for="username" class="block font-bold mb-2 text-xs md:text-base">Username<span
                            class="text-red-600"> *</span></label>
                    <input type="text" id="username" name="username"
                        class="lowercase bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                    <span class="validation-error error-username text-red-500">{{ $errors->first('username') }}</span>
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-bold mb-2 text-xs md:text-base">Password<span
                            class="text-red-600"> *</span></label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                    <span class="validation-error error-password text-red-500">{{ $errors->first('password') }}</span>
                </div>
                <div class="mb-10">
                    <label for="confirmpassword" class="block font-bold mb-2 text-xs md:text-base">Confirm Password<span
                            class="text-red-600"> *</span></label>
                    <input type="password" id="confirmpassword" name="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        required />
                </div>
                <button type="submit" id="submit"
                    class="text-white bg-indigo-900 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded w-full sm:w-auto px-5 py-2.5 text-center text-xs md:text-base">
                    Sign up
                </button>
                <p class="mt-1 text-center text-xs md:text-base">
                    Already have an account? <a href="{{ route('login') }}" class="text-indigo-900">Sign in.</a>
                </p>
            </form>
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

            function isLoading(i) {
                if (i == 0) {
                    $("#submit").html("Submit");
                    $("#submit").removeAttrr("disabled");

                } else {
                    $("#submit").html("Loading...");
                    $("#submit").attr("disabled", "true");
                }
            }

            function clearSignupForm() {
                $('#signup_form').trigger("reset");
                $('span.validation-error').text('');
            }

            clearSignupForm()

            $("#signup_form").submit(function(e) {
                e.preventDefault();
                isLoading(1)
                let form = document.getElementById("signup_form")
                let fd = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('register') }}",
                    data: fd,
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        location.href = "{{ route('login') }}"
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $('#signup_form').find('span.validation-error').text('');
                            $.each(errors, function(s, v) {
                                $('#signup_form').find('span.error-' + s).text(v[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
