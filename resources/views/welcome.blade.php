<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Learning Platform</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,700,500,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body class="antialiased min-h-screen flex flex-col  " x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 500)">

    <header class="py-2 bg-[#f9c365] overflow-x-hidden">
        <nav class="container  pb-[8vh] px-3">
            <div class="flex justify-evenly items-center py-3">
                <div class="flex gap-8 text-lg font-semibold">
                    <a href="">Home</a>
                    <a href="">Blog</a>
                    <a href="">Course</a>
                </div>
                <div>logo</div>

                <div class="space-x-5 text-black pe-5 " x-data="{ hover: '' }">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-black">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-black text-lg  transition duration-300 transform hover:scale-105"
                                x-on:mouseenter="hover = 'login'" x-on:mouseleave="hover = ''"
                                x-bind:class="{ '': hover === 'login' }">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-white  text-lg bg-black rounded-2xl px-3 py-2 transition duration-300 transform hover:scale-105"
                                    x-on:mouseenter="hover = 'register'" x-on:mouseleave="hover = ''"
                                    x-bind:class="{ '': hover === 'register' }">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
        <div class="flex justify-evenly pb-[5vh]">
            <div class="text-6xl leading-tight font-clash font-semibold">
                <h2>Improve Your <br> <span class="bg-black text-[#f9c365] rounded-3xl px-1 ">Skills</span> Faster</h2>
            </div>
            <div class="text-xl">
                <h1>Speed Up Skill Acquisition Process By <br>Finding Unlimited Courses That Matches <br>Your Niche</h1>
                <div class="pt-5"><button
                        class="px-3 rounded-e-full rounded-s-full border-2 border-black flex flex-row items-center">Enroll Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></button></div>
            </div>
        </div>
        <div class="flex justify-center relative">
            <img src="{{ asset('images/headerbg.png') }}" alt="Logo">
            <div class="absolute top-0 -right-1 ">
                <img src="{{ asset('images/bg1.png') }}" alt="Logo" class="w-[10vw]">
            </div>
            <div class="absolute bottom-5 -left-4 ">
                <img src="{{ asset('images/bg2.png') }}" alt="Logo" class="w-[10vw]">
            </div>

        </div>
    </header>
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">

                <div class="flex flex-col items-center">
                    <span class="text-5xl font-bold mb-2">4.5</span>
                    <span class="text-gray-600">80K Reviews</span>
                </div>

                <div class="hidden md:block h-12 w-px  bg-[#f9c365]"></div>

                <div class="flex flex-col items-center">
                    <span class="text-5xl font-bold mb-2">30M</span>
                    <span class="text-gray-600">Enrollments</span>
                </div>

                <div class="hidden md:block h-12 w-px bg-[#f9c365]"></div>

                <div class="flex flex-col items-center">
                    <span class="text-5xl font-bold mb-2">2M+</span>
                    <span class="text-gray-600">Learners</span>
                </div>

                <div class="hidden md:block h-12 w-px bg-[#f9c365]"></div>

                <div class="flex flex-col items-center">
                    <span class="text-5xl font-bold mb-2">1k+</span>
                    <span class="text-gray-600">Popular Courses</span>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-[#fef7e4] flex flex-row justify-evenly items-center">
        <div>
            <img src="{{ asset('images/about1.png') }}" alt="Logo">
        </div>
        <div class="w-[25vw]">
            <h1 class="font-clash text-5xl font-medium pb-4">We Provide <span
                    class="border-2 border-black rounded-3xl px-2 bg-[#fac365] leading-tight italic font-serif">Smart</span>
                Online Education</h1>
            <p class="text-lg text-[#7a7372]">Our Courses Come With Assigned Projects, Direct Interactions With Mentors,
                Relevant Resources, And Tools That Help You Dive Into In-Depth Learning From Anywhere.</p>
        </div>

    </section>
    <section class="flex flex-col gap-[5vh] justify-center px-[10vw] pt-[10vh] pb-[9vh]">
        <div class=" flex flex-row gap-[5vw] justify-center">
            <div class="bg-[#1d1d1d] shadow-lg basis-2/4 rounded-2xl px-[5vw] pb-[8vh] ">
                <h1 class="text-white text-5xl font-clash py-[5vh] leading-tight pb-[5vh]">Our <span>Features
                    </span><br>Special For You</h1>
                <button
                    class="items-center flex flex-row gap-3 bg-[#fac365] rounded-e-full rounded-s-full px-4 py-3 ">See
                    All Featurs <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg></button>
            </div>
            <div class=" bg-white shadow-lg basis-1/4  rounded-2xl px-[2vw] items-center py-[4vh]">
                <div class="w-[20vw]">
                    <img src="{{ asset('images/certificate.png') }}">
                </div>
                <div>
                    <h1 class="text-xl font-semibold">Get Certificate</h1>
                    <p class="text-sm">Add Value To Your Certificates And Increase Your Chances Of Getting
                        Hired In Your Dream Job.</p>
                </div>



            </div>

        </div>
        <div class="flex flex-row gap-[3vw] justify-center">
            <div class="basis-1/4 rounded-xl shadow-2xl px-8 py-7 bg-white items-center">
                <div class="w-[10vw] pb-6 pt-5">
                    <img src="{{ asset('images/cart2.png') }}">
                </div>
                <div>
                    <h1 class="text-xl font-semibold">Amazing Instructor</h1>
                    <p class="text-sm ">Our Amazing Instructors Bring Experience, Knowledge And Fun
                        On The Table</p>
                </div>
            </div>
            <div class="basis-1/4 rounded-xl shadow-2xl px-8 py-7 bg-white items-center">
                <div class="w-[10vw] pb-5">
                    <img src="{{ asset('images/cart3.png') }}">
                </div>
                <div>
                    <h1 class="text-xl font-semibold">Life Time Support</h1>
                    <p class="text-sm ">You Will Have Life Times Access Of The Courses & Resources, Also Contacting
                        Instructors Any Time!</p>
                </div>
            </div>
            <div class="basis-1/4 rounded-xl shadow-2xl px-8 py-7 bg-white items-center">
                <div class="w-[10vw] pb-5">
                    <img src="{{ asset('images/cart4.png') }}">
                </div>
                <div>
                    <h1 class="text-xl font-semibold">Video Lesson</h1>
                    <p class="text-sm ">Recorded Version Of Lectures From Professional Instructions
                        To Boost Your Growth.</p>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-[#1e1e1e] py-[10vh] flex flex-col justify-center  items-center">
        <div class="pb-10">
            <h1 class="text-white text-5xl font-clash font-medium">Popular <span
                    class=" rounded-e-full rounded-s-full px-2 border-2 border-[#e9b74b] text-[#e9b74b] font-serif">Courses</span>
            </h1>
        </div>
        <div class="flex flex-row gap-10">
            <div class="bg-white shadow-xl rounded-xl basis-1/3 py-10">
                <div>
                    <img src="{{ asset('images/course1.png') }}">
                </div>
                <div class="px-5">
                    <h1 class="text-2xl font-semibold  pb-5">Full Steak Developer</h1>
                    <button class="border-2 hover:bg-[#e9b74b] px-4 py-1 border-black rounded-e-full rounded-s-full text-lg font-bold ">View
                        Course </button>
                </div>

            </div>
            <div class="bg-white shadow-xl rounded-xl basis-1/3 py-10">
                <div>
                    <img src="{{ asset('images/course2.png') }}">
                </div>
                <div class="px-5">
                    <h1 class="text-2xl font-semibold  pb-5">Full Steak Developer</h1>
                    <button class="border-2 hover:bg-[#e9b74b] px-4 py-1 border-black rounded-e-full rounded-s-full text-lg font-bold ">View
                        Course </button>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-xl basis-1/3 py-10">
                <div>
                    <img src="{{ asset('images/course3.png') }}">
                </div>
                <div class="px-5">
                    <h1 class="text-2xl font-semibold  pb-5">Full Steak Developer</h1>
                    <button class="border-2 hover:bg-[#e9b74b] px-4 py-1 border-black rounded-e-full rounded-s-full text-lg font-bold ">View
                        Course </button>
                </div>
            </div>

        </div>
    </section>
    <section class="flex flex-row justify-evenly pb-[20vh] pt-[10vh]">

        <div class="flex flex-col">
            <div class="font-clash text-5xl leading-tight pb-8">
                <h1 class="font-medium">Its easy to start</h1>
                <span
                    class="px-3 font-medium italic text-black bg-[#fac365] border-2 border-black rounded-e-full rounded-s-full font-serif">Learning</span>
            </div>
            <div class="w-[29vw]  font-sans text-[#727272] text-md pb-5">
                <p>Our Sign-In Process Lets You Start Your Leatning Journey Without Much Hassle. Our Aim Is To Create A
                    Great Learning Experience For You.</p>
            </div>
            <div class="pb-3 flex flex-row gap-4">

                <svg class="w-5 bg-[#fac365]  rounded-full" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Interface / Check">
                            <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </g>
                </svg>
                <p class=" font-semibold">Create Acount</p>
            </div>
            <div class="pb-3 flex flex-row gap-4">

                <svg class="w-5 bg-[#fac365] rounded-full" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Interface / Check">
                            <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </g>
                </svg>
                <p class=" font-semibold">Purchase Lessons</p>
            </div>
            <div class="pb-3 flex flex-row gap-4">

                <svg class="w-5 bg-[#fac365] rounded-full" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Interface / Check">
                            <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </g>
                </svg>
                <p class=" font-semibold">Start Learning</p>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/about2.png') }}">
        </div>

    </section>

<section class="bg-[#fef7e4] py-10  relative  justify-center items-center ">
    <div class="absolute bg-[#fac365] flex flex-row  w-[55vw] rounded-3xl justify-center gap-[5vw] items-center -top-[20%] left-[20vw] ">
        <div class="w-[20vw]">
            <img src="{{ asset('images/about3.png') }}"> 
        </div>
        <div class="">
           <h1 class=" font-clash font-medium text-4xl pb-5"> Get <span class=" font-serif">Ready</span> To Started</h1>
          <p class="text-md w-[23vw] font-medium pb-5">After A Good Dinner One Can Forgive Anybody, Even Own Relation.</p>
          
            <button class=" flex flex-row bg-[#1d1d1d] px-4 rounded-e-full rounded-s-full py-2 text-[#fac365] text-lg items-center"> Order Now  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg></button>
          
        </div>

    </div>

<div class="mb-[50vh]">
    <h1 class="text-5xl font-medium font-clash pt-[28vh] leading-tight text-center ">Try Learning Free <br> On <span class=" font-serif border-2 border-black rounded-e-full rounded-s-full bg-[#e9b74b] px-4 font-light">Mobile App</span></h1>
</div>
<div class=" absolute bg-[#1d1d1d] w-[80vw]  left-[10vw] bottom-0  rounded-t-3xl mt-[20vh] pt-[5vh] pb-[3vh]">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
        <div class="col-span-1 ps-5">
            {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-48 mb-6"> --}}
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-32 mb-6">
        </div>

        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-3 text-white">Platform</h3>
            <ul class="space-y-3 px-2 text-sm">
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">About
                        Us</a></li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Security
                        Alerts</a></li>
                <li><a href="#"
                        class="text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Statistics</a>
                </li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Contact</a>
                </li>
            </ul>
        </div>

        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-3 text-white">Resources</h3>
            <ul class="space-y-3 px-2 text-sm">
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Documentation</a>
                </li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Forums</a>
                </li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Service
                        Providers</a></li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Jobs</a>
                </li>
            </ul>
        </div>

        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-3 text-white">Development</h3>
            <ul class="space-y-3 px-2 text-sm">
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Dev
                        Docs</a></li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Roadmap</a>
                </li>
                <li><a href="#"
                        class=" text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Developer
                        Forum</a></li>
                <li><a href="#"
                        class="  text-white hover:text-[#fac365] hover:font-semibold transition duration-300">Translation</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-[#fac365] border-3 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">

            <div class="flex flex-wrap justify-center md:justify-start gap-4 text-md ps-5">
                <a href="#" class=" text-white hover:text-[#fac365] transition duration-300">Privacy Notice</a>
                <span class="  text-[#fac365]/40">|</span>
                <a href="#" class="text-white hover:text-[#fac365] transition duration-300">Cookies Policy</a>
                <span class="text-[#fac365]/40">|</span>
                <a href="#" class="text-white hover:text-[#fac365] transition duration-300">Data Settings</a>
                <span class="text-[#fac365]/40">|</span>
                <a href="#" class="hover:text-[#fac365] text-white transition duration-300">Accessibility</a>
            </div>

            <div class="flex space-x-6 text-lg pe-5">
                <a href="#" class="text-white hover:text-[#fac365] transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-[#fac365] transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-[#fac365] transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-[#fac365]  transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    </div>
</div>




</section>

  
   
   




   
</body>

</html>
