<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Navigation Links -->


                <div class="  flex flex-col justify-center items-center">

                    <nav
                        class="bg-[#fef7e4] px-10 h-screen fixed top-0 left-0 w-[15vw] py-6  font-[sans-serif] overflow-auto justify-center items-center">
                        <div class="col-span-1 ps-5">
                            {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-48 mb-6"> --}}
                            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-32 mb-6">
                        </div>
                        <div class="flex flex-row gap-3">
                            <div class="w-5">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z"
                                            fill=" #f9c365"></path>
                                    </g>
                                </svg>
                            </div>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg hover:text-[#fac365] hover:bg-[#1d1d1d] hover:font-bold hover:px-3 hover:rounded-e-full">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                        <div class="flex flex-row gap-3 mt-4">
                            <div class="w-6">
                                <svg fill="#fac365" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 190" enable-background="new 0 0 256 190" xml:space="preserve" stroke="#fac365"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M48.12,27.903C48.12,13.564,59.592,2,74.023,2c14.339,0,25.903,11.564,25.903,25.903 C99.834,42.335,88.27,53.806,74.023,53.806C59.684,53.806,48.12,42.242,48.12,27.903z M191,139h-47V97c0-20.461-17.881-37-38-37H43 C20.912,60,1.99,79.14,2,98v77c-0.026,8.533,6.001,12.989,12,13c6.014,0.011,12-4.445,12-13v-75h8v88h78v-88h8l0.081,50.37 c-0.053,8.729,5.342,12.446,10.919,12.63h60C207.363,163,207.363,139,191,139z M168.711,120.755c16.993,0,25.774,2.739,29.553,4.418 H157V72.326h6.627v48.456l4.105-0.027H168.711z M203.22,73.855c0,8.156,0,49.448,0,49.448s-7.626-6.627-34.495-6.627h-1.02 c0-7.817,0-49.788,0-49.788s1.529-0.061,3.949-0.061h0.007C179.981,66.827,198.883,67.541,203.22,73.855z M243.268,120.755 l4.105,0.027V72.326H254v52.847h-41.265c3.779-1.679,12.561-4.418,29.553-4.418H243.268z M239.339,66.827h0.007 c2.42,0,3.949,0.061,3.949,0.061s0,41.971,0,49.788h-1.02c-26.869,0-34.495,6.627-34.495,6.627s0-41.292,0-49.448 C212.117,67.541,231.019,66.827,239.339,66.827z"></path> </g></svg>
                            </div>
                            <x-nav-link :href="route('mycourse')" :active="request()->routeIs('Courses')" class="text-lg  hover:text-[#fac365] hover:bg-[#1d1d1d] hover:font-bold hover:px-3 hover:rounded-e-full">
                                {{ __('Courses') }}
                            </x-nav-link>
                        </div>

                        <div class="mt-4">

                            @can('admin')
                                <div class="flex flex-row gap-3">
                                    <div>
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M7 10H17M7 14H12M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                                                    stroke="#fbd479" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <x-nav-link :href="route('allUsers')" :active="request()->routeIs('dashboard')">
                                        {{ __('User') }}
                                    </x-nav-link>
                                </div>

                                <x-nav-link :href="route('admin.role')" :active="request()->routeIs('dashboard')" class="text-lg  hover:text-[#fac365] hover:bg-[#1d1d1d] hover:font-bold hover:px-3 hover:rounded-e-full">
                                    {{ __('Demande Coach') }}
                                </x-nav-link>
                            @endcan
                            <div class="flex flex-row gap-3">
                                <div class="w-6">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 10H17M7 14H12M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#fbd479" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                                <x-nav-link :href="route('calendriershow')" :active="request()->routeIs('dashboard')" class="text-lg  hover:text-[#fac365] hover:bg-[#1d1d1d] hover:font-bold hover:px-3 hover:rounded-e-full">
                                    {{ __('Calendrier') }}
                                </x-nav-link>
                            </div>
                        </div>
                        {{-- <div class="mt-8">
                            <h1>Mentor</h1>
                    
                            @foreach ($users as $user)
                            @if (Auth::user()->role === 'coach')
                                
                            @endif
                                <p>{{ $user->name }}</p>
                            @endforeach
                       
                        </div> --}}

                    </nav>


                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-3 px-3 py-2  text-md leading-4 font-medium rounded-md text-black   focus:outline-none transition ease-in-out duration-150">
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                alt="{{ Auth::user()->name }}">
                            <div>{{ Auth::user()->name }}</div>

                            {{-- <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div> --}}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 ">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
