@foreach ($results as $result)
    <li>
        <a href="{{ route('profile', ['username' => $result->username]) }}"
            class="flex items-center px-4 py-2 hover:bg-gray-100">
            <div class="w-6 h-6 mr-2 bg-black rounded-full"
                style="background-image: url('{{ asset('storage/static/images') . '/' . $result->profile_picture }}'); background-size: cover">
            </div>
            <div class="flex items-center font-bold text-[14px] md:text-base">
                {{ $result->username }}
                @if ($result->verified == 1)
                    <img src="{{ asset('assets/images/verified.svg') }}" class="ml-2 h-4 w-4" />
                @elseif ($result->verified == 2)
                <img src="{{ asset('assets/images/amogus.png') }}" class="ml-2 h-4 w-4" />
                @endif
            </div>
        </a>
    </li>
@endforeach
