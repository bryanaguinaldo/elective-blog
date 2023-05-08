@extends('layout.base')

@section('content')
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="grid grid-cols-12 gap-6 w-max-full">
            <div class="col-span-12 xl:col-span-7" id="results">
                <div class="mb-4">
                    <p class="text-[18px] md:text-xl font-bold">Feed</p>
                </div>
                {{-- {{ $posts->links('pagination::bootstrap-4') }} --}}

                <div class="scrolling-pagination">
                    @foreach ($posts as $post)
                        <!-- Post 1 -->
                        <div class="w-full h-max bg-white rounded shadow p-4 mb-4">
                            <!-- User -->
                            <div class="flex w-full justify-between">
                                <div class="flex items-center">
                                    <a href="{{ route('profile', ['username' => $post->user->username]) }}">
                                        <div class="w-[40px] h-[40px] aspect-square bg-cover bg-red-500 rounded-full"
                                            style="background-image: url('{{ asset('storage/static/images') . '/' . $post->user->profile_picture }}')">
                                        </div>
                                    </a>
                                    <div class="mx-4">
                                        <a href="{{ route('profile', ['username' => $post->user->username]) }}">

                                            <div class="flex items-center font-bold text-[14px] md:text-base">
                                                {{ $post->user->first_name . ' ' . $post->user->last_name }}
                                                @if ($post->user->verified == 1)
                                                    <img src="{{ asset('assets/images/verified.svg') }}"
                                                        class="ml-2 h-4 w-4" />
                                                @endif
                                            </div>
                                        </a>
                                        <div class="text-neutral-500 text-[14px] md:text-base">
                                            {{ \Carbon\Carbon::now()->subDays(7) >= \Carbon\Carbon::parse($post->created_at) ? $post->created_at->format('F d, Y') : $post->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title + Caption + Pic -->
                            <div class="flex flex-col mt-4">
                                <p class="text-[18px] md:text-xl font-bold">{{ $post->title }}</p>
                                <p class="mt-2 text-[14px] md:text-base">
                                    {{ $post->content }}
                                </p>
                                @if ($post->photo != null)
                                    <a href="{{ route('post.show', ['id' => $post->id]) }}">
                                        <button class="w-full mt-4 aspect-square bg-cover"
                                            style="background-image: url('{{ asset('storage/static/uploaded' . '/' . $post->photo) }}')"></button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Other users -->
            <div class="hidden xl:flex lg:flex-col lg:col-span-5">
                <div class="mb-4">
                    <p class="text-[18px] md:text-xl font-bold">Check out other users</p>
                </div>
                @foreach ($others as $other)
                    <div class="w-full h-max bg-white rounded shadow p-4 mb-4">
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
                                        <div class="text-neutral-500 text-[14px] md:text-base">{{ '@' . $other->username }}
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
                            {{-- <!-- 3 images -->
                        <div class="grid grid-cols-3 gap-2 w-full h-full mt-6">
                            <div class="col-span-1 w-full h-full aspect-square bg-cover bg-black hover:bg-blend-multiply hover:bg-opacity-50"
                                style="background-image: url(https://picsum.photos/1920/1080?random=2)"></div>
                            <div class="col-span-1 w-full h-full aspect-square bg-cover bg-black hover:bg-blend-multiply hover:bg-opacity-50"
                                style="background-image: url(https://picsum.photos/1920/1080?random=3)"></div>
                            <div class="col-span-1 w-full h-full aspect-square bg-cover bg-black hover:bg-blend-multiply hover:bg-opacity-50"
                                style="background-image: url(https://picsum.photos/1920/1080?random=4)"></div>
                        </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script>
@endsection
