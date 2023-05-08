@extends('layout.base')

@section('content')
    <!-- Content Div -->
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="mb-4">
            <p class="text-[18px] md:text-xl font-bold">Settings</p>
        </div>
        @if (Session::has('message'))
            <div class="flex flex-col my-4 md:mt-8 w-full">
                <div
                    class="w-full h-max border {{ Session::get('status') == 0 ? 'border-red-150 bg-red-50' : 'border-green-150 bg-green-50' }} p-2 rounded-md">
                    <p class="font-bold {{ Session::get('status') == 0 ? 'text-red-800' : 'text-green-800' }}">
                        {{ Session::get('title') }}</p>
                    <p class="{{ Session::get('status') == 0 ? 'text-red-800' : 'text-green-800' }}">
                        {{ Session::get('message') }}</p>
                </div>
            </div>
        @endif
        <div class="w-full h-max flex flex-col bg-white p-6 rounded shadow mb-4">
            <!-- Personal Information -->
            <div class="mb-4">
                <p class="text-[18px] md:text-xl font-bold"><i class="fa-solid fa-user-edit"></i> User Information</p>
            </div>
            <div class="pt-4 mb-4 space-y-2 font-medium border-t border-gray-200"></div>
            <form action="{{ route('settings.update_information') }}" method="POST" class="mx-4">
                @csrf
                <div class="grid grid-cols-12 gap-6 w-full h-max">
                    <div class="col-span-12 lg:col-span-6">
                        <label for="firstname" class="block font-bold mb-2 text-xs md:text-base">First name</label>
                        <input type="text" id="firstname" name="first_name" value={{ Auth::user()->first_name }}
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                        @error('first_name')
                            <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                        @enderror
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <label for="lastname" class="block font-bold mb-2 text-xs md:text-base">Last
                            name</label>
                        <input type="text" id="lastname" name="last_name" value={{ Auth::user()->last_name }}
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                        @error('last_name')
                            <span class="text-red-500">{{ $errors->first('last_name') }}</span>
                        @enderror
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <label for="username" class="block font-bold mb-2 text-xs md:text-base">Username</label>
                        <input type="text" id="username" name="username" value={{ Auth::user()->username }}
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                        @error('username')
                            <span class="text-red-500">{{ $errors->first('username') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end mt-8">
                    <button
                        class="block w-max xl:w-[256px] md:h-[48px] text-[14px] md:text-base font-semibold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Bio -->
        <div class="w-full h-max flex flex-col bg-white p-6 rounded shadow mb-4">
            <div class="mb-4">
                <p class="text-[18px] md:text-xl font-bold"><i class="fa-solid fa-exclamation-circle"></i> Change Bio</p>
            </div>
            <div class="pt-4 mb-4 space-y-2 font-medium border-t border-gray-200"></div>
            <form action="{{ route('settings.update_bio') }}" method="post" class="mx-4">
                @csrf
                <div class="grid grid-cols-12 gap-6 w-full h-max">
                    <div class="col-span-12 lg:col-span-12">
                        <label for="bio" class="block font-bold mb-2 text-xs md:text-base">Bio</label>
                        <textarea name="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 resize-none"
                            rows="4">{{ Auth::user()->description }}</textarea>
                        @error('description')
                            <span class="text-red-500">{{ $errors->first('description') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end mt-8">
                    <button type="submit"
                        class="block w-max xl:w-[256px] md:h-[48px] text-[14px] md:text-base font-semibold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Password -->
        <div class="w-full h-max flex flex-col bg-white p-6 rounded shadow mb-4">
            <div class="mb-4">
                <p class="text-[18px] md:text-xl font-bold"><i class="fa-solid fa-user-lock"></i> Change Password</p>
            </div>
            <div class="pt-4 mb-4 space-y-2 font-medium border-t border-gray-200"></div>
            <form action="{{ route('settings.update_password') }}" method="post" class="mx-4">
                @csrf
                <div class="grid grid-cols-12 gap-6 w-full h-max">
                    <div class="col-span-12 lg:col-span-6 col-start-1">
                        <label for="currentpass" class="block font-bold mb-2 text-xs md:text-base">Current Password</label>
                        <input type="password" id="currentpass" name="current_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                        @error('current_password')
                            <span class="text-red-500">{{ $errors->first('current_password') }}</span>
                        @enderror
                    </div>
                    <div class="col-span-12 lg:col-span-6 lg:col-start-1">
                        <label for="newpass" class="block font-bold mb-2 text-xs md:text-base">New Password</label>
                        <input type="password" id="newpass" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                        @error('password')
                            <span class="text-red-500">{{ $errors->first('password') }}</span>
                        @enderror
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <label for="confirmpass" class="block font-bold mb-2 text-xs md:text-base">Confirm
                            Password</label>
                        <input type="password" id="confirmpass" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs md:text-sm rounded focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                            required />
                    </div>
                </div>
                <div class="flex justify-end mt-8">
                    <button type="submit"
                        class="block w-max xl:w-[256px] md:h-[48px] text-[14px] md:text-base font-semibold text-white bg-indigo-900 hover:bg-indigo-950 focus:outline-none rounded px-5 py-2.5 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
