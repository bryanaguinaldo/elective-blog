@extends('layout.view-post')

@section('content')
    <div class="w-full h-screen flex">
        <!-- Content -->
        <div class="grid grid-rows-2 lg:grid-rows-1 lg:grid-cols-12 w-full lg:h-full">
            <!-- Image -->
            <div class="row-span-1 lg:col-span-7 flex w-full h-[50vh] lg:h-screen bg-black items-center justify-center">
                <img src="{{ asset('storage/static/uploaded') . '/' . $post->photo }}"
                    class="m-auto object-contain w-auto h-full" />
            </div>
            <!-- Caption -->
            <div class="row-span-1 lg:col-span-5 bg-white lg:h-full px-6 sm:px-12 py-6 overflow-y-scroll">
                <div class="flex justify-end">
                    <a href="{{ url()->previous() == request()->url() ? route('home') : url()->previous() }}">
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm p-1.5 ml-auto inline-flex items-center">
                            <i class="flex fa-solid fa-x w-5 h-5 items-center justify-center"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </a>
                </div>
                <!-- User -->
                <div class="flex items-center">
                    <div class="w-[40px] h-[40px] aspect-square bg-cover bg-red-500 rounded-full"
                        style="background-image: url('{{ asset('storage/static/images') . '/' . $post->user->profile_picture }}')">
                    </div>
                    <div class="mx-4">
                        <div class="flex items-center font-bold text-[14px] md:text-base">
                            {{ $post->user->first_name . ' ' . $post->user->last_name }}
                            @if ($post->user->verified == 1)
                                <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
                            @elseif($post->user->verified == 2)
                                <img src="{{ asset('assets/images/amogus.png') }}" class="ml-2 h-4 w-4" />
                            @endif
                        </div>
                        <div class="text-neutral-500 text-[14px] md:text-base">
                            {{ \Carbon\Carbon::now()->subDays(7) >= \Carbon\Carbon::parse($post->created_at) ? $post->created_at->format('F d, Y') : $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <!-- Post content -->
                <div class="font-bold text-lg lg:text-2xl mt-6">{{ $post->title }}</div>
                <div class="text-xs sm:text-base text-justify my-2 text-clip" style="overflow-y: auto">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
