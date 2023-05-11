<button data-drawer-target="sm-sidebar" data-drawer-toggle="sm-sidebar" aria-controls="sm-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sm-sidebar"
    class="fixed top-0 left-0 z-40 w-64 lg:w-96 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r-2 border-gray-200"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white">
        <a href="{{ route('home') }}" class="flex items-center pl-2.5 mb-5">
            <!-- <img src="/src/images/hotfog.png" class="h-6 mr-3 sm:h-7" alt="Logo" /> -->
            <span class="self-center text-xl font-bold whitespace-nowrap text-indigo-900">Hatdog Logo</span>
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('home') }}"
                    class="flex items-center p-2 text-neutral-900 rounded-lg hover:bg-gray-100">
                    <i class="fa-solid fa-home"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
                    class="flex items-center p-2 text-neutral-900 rounded-lg hover:bg-gray-100">
                    <i class="fa-solid fa-user"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                    class="flex items-center p-2 text-neutral-900 rounded-lg hover:bg-gray-100">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200"></ul>
        <ul>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-neutral-900 transition duration-75 rounded-lg group hover:bg-gray-100 outline-none"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <div style="background-image: url('{{ asset('storage/static/images') . '/' . Auth::user()->profile_picture }}')"
                        class="bg-black w-[40px] h-[40px] rounded-full aspect-square bg-cover hover:ring-4 hover:outline-none hover:ring-neutral-300">
                    </div>
                    <span class="flex-1 ml-3 text-left font-bold whitespace-nowrap"
                        sidebar-toggle-item>{{ Auth::user()->username }}</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('settings') }}"
                            class="flex items-center w-full p-2 text-neutral-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100"><i
                                class="fa-solid fa-cog"></i><span
                                class="flex-1 ml-3 whitespace-nowrap">Settings</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center w-full p-2 text-red-600 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100"><i
                                class="fa-solid fa-power-off"></i><span
                                class="flex-1 ml-3 whitespace-nowrap">Logout</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
