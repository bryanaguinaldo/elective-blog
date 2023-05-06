<div
    class="grid grid-cols-12 w-[80%] h-[50px] md:h-[64px] mt-[32px] md:mt-[32px] mx-[10%] px-4 bg-white shadow-md rounded items-center font-bold text-lg">
    <div class="col-span-11 md:col-span-4 xl:col-span-8">Insert Logo Here</div>
    <!-- Home -->
    <a href="#" class="hidden md:flex md:col-span-2 xl:col-span-1 space-x-2 items-center">
        <i class="fa-solid fa-house"></i>
        <p>Home</p>
    </a>
    <!-- Profile -->
    <a href="#" class="hidden md:flex md:col-span-2 xl:col-span-1 space-x-2 items-center">
        <i class="fa-solid fa-user"></i>
        <p>Profile</p>
    </a>
    <!-- About -->
    <a href="#" class="hidden md:flex md:col-span-2 xl:col-span-1 space-x-2 items-center">
        <i class="fa-solid fa-question-circle"></i>
        <p>About</p>
    </a>
    <!-- User dropdown -->
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="hidden w-max text-black font-bold text-sm px-4 py-2.5 text-center md:inline-flex items-center space-x-2"
        type="button">
        <img src=""
            class="w-[40px] h-[40px] rounded-full hover:ring-4 hover:outline-none hover:ring-neutral-300" />
        <i class="fa-solid fa-angle-down"></i>
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i class="fa-solid fa-cog"></i>
                    Settings</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-red-600 hover:bg-gray-100"><i
                        class="fa-solid fa-power-off"></i> Logout</a>
            </li>
        </ul>
    </div>
    <!-- Burger menu -->
    <div class>
        <button class="flex md:hidden col-span-1 items-center">
            <i class="fa-solid fa-bars" type="button" data-drawer-target="burger-menu" data-drawer-show="burger-menu"
                aria-controls="burger-menu"></i>
        </button>
        <!-- drawer component -->
        <div id="burger-menu"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80"
            tabindex="-1" aria-labelledby="burger-menu-label">
            <h5 id="burger-menu-label" class="text-base font-semibold text-gray-500 uppercase">Menu</h5>
            <button type="button" data-drawer-hide="burger-menu" aria-controls="burger-menu"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-4 right-2.5 inline-flex items-center">
                <i class="fa-solid fa-x"></i>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                            <i class="fa-solid fa-house"></i>
                            <span class="ml-3">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                            <i class="fa-solid fa-user"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                            <i class="fa-solid fa-question-circle"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                            <i class="fa-solid fa-cog"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center p-2 text-red-600 rounded-lg hover:bg-gray-100">
                            <i class="fa-solid fa-power-off"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
