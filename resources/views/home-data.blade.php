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
                                <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
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
                {!! $post->content !!}
            </p>
            @if ($post->photo != null)
                <a href="{{ route('post.show', ['id' => $post->id]) }}">
                    <button class="w-full mt-4 aspect-square bg-cover bg-center"
                        style="background-image: url('{{ asset('storage/static/uploaded' . '/' . $post->photo) }}')"></button>
                </a>
            @endif
        </div>
    </div>
@endforeach
