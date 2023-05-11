@foreach ($posts as $post)
    <!-- Post -->
    <div>
        <div class="flex flex-col items-center mb-2 mx-6">
            <div class="w-full h-max bg-white rounded shadow p-4 mb-4">
                <!-- User -->
                <div class="flex w-full justify-between">
                    <div class="flex items-center">
                        <div class="w-[40px] h-[40px] aspect-square bg-cover bg-red-500 rounded-full"
                            style="background-image: url('{{ asset('storage/static/images') . '/' . $post->user->profile_picture }}')">
                        </div>
                        <div class="mx-4">
                            <div class="flex items-center font-bold text-[14px] md:text-base">
                                {{ $post->user->first_name . ' ' . $post->user->last_name }}
                                @if ($post->user->verified == 1)
                                    <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
                                @elseif ($post->user->verified == 2)
                                <img src="{{ asset('assets/images/amogus.png') }}" class="ml-2 h-4 w-4" />
                                @endif
                            </div>
                            <div class="text-neutral-500 text-[14px] md:text-base">
                                {{ \Carbon\Carbon::now()->subDays(7) >= \Carbon\Carbon::parse($post->created_at) ? $post->created_at->format('F d, Y') : $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    @if ($post->user->id == Auth::user()->id)
                        <!-- Menu Dropdown -->
                        <button id="dropdownMenuButton{{ $post->id }}"
                            data-dropdown-toggle="menu-dropdown{{ $post->id }}"
                            class="flex justify-end p-4 text-neutral-500 hover:bg-gray-200 hover:text-gray-900 rounded outline-none"
                            type="button">
                            <i class="fa-solid fa-ellipsis-h"></i>
                        </button>
                        <!-- User dropdown component -->
                        <div id="menu-dropdown{{ $post->id }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <button type="hidden" data-modal-target="editpost-modal"
                                        data-modal-toggle="editpost-modal" id="edit_trigger"></button>
                                    <button data-id="{{ $post->id }}" id="edit_post"
                                        class="block w-full text-start px-4 py-2 hover:bg-gray-100" type="button">
                                        <i class="fa-solid fa-edit"></i> Edit post
                                    </button>
                                </li>
                                <li>
                                    <button data-modal-target="confirmdelete-modal" data-id="{{ $post->id }}"
                                        data-modal-toggle="confirmdelete-modal" id="delete_post"
                                        class="block w-full text-start px-4 py-2 text-red-600 hover:bg-gray-100"
                                        type="button">
                                        <i class="fa-solid fa-trash-can"></i> Delete post
                                    </button>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- Title + Caption + Pic -->
                <div class="flex flex-col mt-4">
                <div class="text-[18px] md:text-xl font-bold break-words">{{ $post->title }}</div>
                <div class="mt-2 text-[14px] md:text-base break-words">
                    {!! $post->content !!}
                </div>
                    @if ($post->photo != null)
                        <a href="{{ route('post.show', ['id' => $post->id]) }}" id="post-see-more"
                            class="w-full mt-4 aspect-square bg-cover bg-center"
                            style="background-image: url('{{ asset('storage/static/uploaded' . '/' . $post->photo) }}')"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
