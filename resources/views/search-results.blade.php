@foreach ($results as $result)
    <li>
        <a href="{{ route('profile', ['username' => $result->username]) }}"
            class="flex items-center px-4 py-2 hover:bg-gray-100">
            <div class="w-6 h-6 mr-2 bg-black rounded-full"
                style="background-image: url('{{ asset('storage/static/images') . '/' . $result->profile_picture }}'); background-size: cover">
            </div>
            {{ $result->username }}
        </a>
    </li>
@endforeach
