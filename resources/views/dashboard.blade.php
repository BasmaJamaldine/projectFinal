<x-app-layout class="ms-[15vw] bg-white">
    <div class="ms-[15vw] bg-white">
        <div>
            <div class="bg-[#d4c59a] w-[50vw] h-[15vw] pt-6 ps-4 m-auto rounded-3xl flex flex-row items-center gap-5">
                <div>
                    <p class="font-serif text-white text-xl mb-3">ONLINE COURSE</p>
                    <h1 class="font-medium font-clash text-white text-3xl">Sharpen Your Skills With <br> Proffessional
                        Online Courses</h1>
                    <div class="h-21">

                    </div>
                </div>
                <div class="">
                    <dotlottie-player src="https://lottie.host/9f027675-2a95-4c4a-835f-c4c806d2b973/CgCKZQnT7k.lottie"
                        background="transparent" speed="1" style="width: 300px; height: 300px" loop
                        autoplay></dotlottie-player>
                </div>

            </div>
            @if (Auth::user()->role == 'admin')
                <div class="w-[49vw] mx-auto py-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-102 transition-all duration-300">
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="bg-[#fef7e4] p-2 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#fac365]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <span class="text-[#fac365] font-clash text-sm">Courses</span>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-3xl font-clash font-bold text-gray-900 mb-1">{{ $totalcourses }}
                                    </h3>
                                    <p class="text-sm text-gray-600">Total Courses</p>
                                </div>
                            </div>
                            <div class="h-1 bg-[#fac365]"></div>
                        </div>

                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-102 transition-all duration-300">
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="bg-[#fef7e4] p-2 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#fac365]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-[#fac365] font-clash text-sm">Students</span>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-3xl font-clash font-bold text-gray-900 mb-1">{{ $totaluser }}
                                    </h3>
                                    <p class="text-sm text-gray-600">Total Students</p>
                                </div>
                            </div>
                            <div class="h-1 bg-[#fac365]"></div>
                        </div>

                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-102 transition-all duration-300">
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="bg-[#fef7e4] p-2 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#fac365]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14" />
                                        </svg>
                                    </div>
                                    <span class="text-[#fac365] font-clash text-sm">Mentors</span>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-3xl font-clash font-bold text-gray-900 mb-1">{{ $totalcoach }}
                                    </h3>
                                    <p class="text-sm text-gray-600">Total Mentors</p>
                                </div>
                            </div>
                            <div class="h-1 bg-[#fac365]"></div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="py-12">
                <div class="w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden  sm:rounded-lg  ">
                        <div class="p-6 sm:p-8 flex flex-row justify-between">
                            @if (Auth::user()->role === 'student')
                                <div>
                                    <button type="button"
                                        class="inline-flex items-center px-6 py-2.5 hover:bg-[#1d1d1d] border border-transparent rounded-full font-clash font-medium text-sm hover:text-[#f9c365] uppercase tracking-wider bg-[#f9c365] text-[#1d1d1d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f9c365] transition-colors duration-200"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Request to become a coach
                                    </button>
                                </div>

                                <div class=" rounded-lg">
                                    <form action="{{ route('course.filter') }}" method="POST"
                                        class="flex flex-col md:flex-row items-start md:items-end gap-4">
                                        @csrf
                                        <div class="w-full md:w-auto">
                                            <div class="relative">
                                                <select id="type" name="type"
                                                    class="block w-full md:w-64 px-4 py-2 bg-white border-2 border-[#f9c365] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#f9c365] focus:border-transparent appearance-none text-gray-700">
                                                    <option value="all" {{ old('type') == 'all' ? 'selected' : '' }}>
                                                        All Courses</option>
                                                    <option value="free"
                                                        {{ old('type') == 'free' ? 'selected' : '' }}>Free Courses
                                                    </option>
                                                    <option value="premium"
                                                        {{ old('type') == 'premium' ? 'selected' : '' }}>Premium Courses
                                                    </option>
                                                </select>
                                                <div
                                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="hover:bg-[#1d1d1d] bg-[#f9c365] text-[#1d1d1d] hover:text-[#f9c365] font-bold  px-6 py-2.5 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                                            Filter Courses
                                        </button>
                                    </form>
                                </div>

                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-[#fef7e4] rounded-2xl shadow-xl">
                                    <div class="modal-header border-b border-[#f9c365] p-4">
                                        <h5 class="modal-title text-xl font-clash font-medium text-[#1d1d1d]"
                                            id="exampleModalLabel">
                                            Demande de rôle - Coach
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-6">
                                        <label for="NE"
                                            class="block text-sm font-clash font-medium text-[#1d1d1d] mb-2">
                                            Niveau d'étude
                                        </label>
                                        <select name="NE" id="NE"
                                            class="mt-1 block w-full px-3 py-2 text-base border-[#f9c365] focus:outline-none focus:ring-[#1d1d1d] focus:border-[#1d1d1d] rounded-xl">
                                            <option value="bac">Bac +3</option>
                                            <option value="bac5">Bac +5</option>
                                        </select>
                                    </div>
                                    <div
                                        class="modal-footer bg-[#fef7e4] px-6 py-4 sm:flex sm:flex-row-reverse rounded-b-2xl">
                                        <button type="button"
                                            class="w-full sm:w-auto px-6 py-2.5 bg-[#f9c365] text-[#1d1d1d] rounded-full font-clash font-medium text-sm hover:bg-[#e9b74b] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1d1d1d] transition-colors duration-200 sm:ml-3"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <form action="{{ route('coach.request') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full sm:w-auto mt-3 sm:mt-0 px-6 py-2.5 bg-[#1d1d1d] text-[#f9c365] rounded-full font-clash font-medium text-sm hover:bg-[#f9c365] hover:text-[#1d1d1d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f9c365] transition-colors duration-200">
                                                Envoyer la demande
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (Auth::user()->role === 'coach')
                        <div class=" flex flex-row gap-10">
 <div class="flex-col">
                                <button type="button" id="submitEvent"
                                    class=" block items-center px-6 py-2.5 hover:bg-[#1d1d1d] border border-transparent rounded-full font-clash font-medium text-sm hover:text-[#f9c365] uppercase tracking-wider bg-[#f9c365] text-[#1d1d1d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f9c365] transition-colors duration-200"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Create course
                                </button>
                            </div>
                            <div class="w-full h-[75vh] bg-white rounded-3xl border-none p-3" id="calendar"></div>
                            {{-- calendrier --}}

                            <script>
                                document.addEventListener('DOMContentLoaded', async function() {
                                    let response = await axios.get("/calendar/create")
                                    let events = response.data.events
                                    let nowDate = new Date();
                                    var myCalendar = document.getElementById('calendar');

                                    var calendar = new FullCalendar.Calendar(myCalendar, {

                                        headerToolbar: {
                                            left: 'dayGridMonth,timeGridWeek,timeGridDay',
                                            center: 'title',
                                            right: 'listMonth,listWeek,listDay'
                                        },

                                        views: {
                                            listDay: { // Customize the name for listDay
                                                buttonText: 'Day Events',

                                            },
                                            listWeek: { // Customize the name for listWeek
                                                buttonText: 'Week Events'
                                            },
                                            listMonth: { // Customize the name for listMonth
                                                buttonText: 'Month Events'
                                            },
                                            timeGridWeek: {
                                                buttonText: 'Week', // Customize the button text
                                            },
                                            timeGridDay: {
                                                buttonText: "Day",
                                            },
                                            dayGridMonth: {
                                                buttonText: "Month",
                                            },

                                        },


                                        initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
                                        slotMinTime: "09:00:00", // min  time  appear in the calendar
                                        slotMaxTime: "19:00:00", // max  time  appear in the calendar
                                        nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
                                        selectable: true, //   kankhali l user  i9ad  i selectioner  wast l calendar
                                        selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
                                        selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
                                        weekends: true, // n7ayed  l weekends    ola nkhalihom 
                                        editable: true,
                                        droppable: true,
                                        // events  hya  property dyal full calendar
                                        //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
                                        events: events,
                                        eventClick: (info) => {


                                            let a = info.event._def.extendedProps
                                            let tranzabadan = document.getElementById('tranzabadan');
                                            let eventStartTime = new Date(a.start_time);
                                            let eventEndTime = new Date(a.end_time);
                                            let nowDate = new Date();
                                            show.click()
                                            let name = document.getElementById('name');
                                            let description = document.getElementById('description');
                                            let place = document.getElementById('place');
                                            let time = document.getElementById('time');
                                            let time2 = document.getElementById('time2');


                                            name.textContent = "Course Name : " + info.event._def.title;
                                            description.textContent = "About the course : " + a.description;
                                            place.textContent = "Places left  : " + a.places;

                                            if (eventStartTime <= nowDate && eventEndTime >= nowDate) {
                                                tranzabadan.textContent = "Take the course";
                                                tranzabadan.classList.remove('cursor-not-allowed', 'bg-green-500');
                                                tranzabadan.classList.add('bg-blue-500', 'hover:bg-blue-600');
                                            } else {
                                                tranzabadan.type = "button";
                                                tranzabadan.textContent = "The course is not available";
                                                tranzabadan.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                                                tranzabadan.classList.add('bg-green-500', 'cursor-not-allowed');
                                            }


                                        },
                                        selectAllow: (info) => {

                                            return info.start >= nowDate;
                                        },

                                        select: (info) => {


                                            if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                                                return
                                            }

                                            console.log(info);
                                            if (info.allDay) {
                                                start.value = info.startStr + " 09:00:00"
                                                end.value = info.startStr + " 19:00:00"

                                            } else {
                                                start.value = info.startStr.slice(0, info.startStr.length - 6)
                                                end.value = info.endStr.slice(0, info.endStr.length - 6)
                                            }

                                            submitEvent.click()
                                        }
                                    });

                                    calendar.render();
                                })
                            </script>

                        </div>
                           

                          
                            {{-- modal course create --}}
                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-white rounded-3xl shadow-2xl">
                                        <div class="modal-header border-b border-[#fac365] p-6">
                                            <h5 class="modal-title text-2xl font-clash font-semibold text-gray-900"
                                                id="exampleModalLabel">
                                                Add New Course
                                            </h5>
                                            <button type="button"
                                                class="text-gray-400 hover:text-[#fac365] transition-colors duration-200"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body p-6">
                                            <form action="{{ route('courses.store') }}" method="POST"
                                                enctype="multipart/form-data" class="space-y-6">
                                                @csrf
                                                <div>
                                                    <label for="name"
                                                        class="block text-lg font-semibold text-[#4a654f]">Course
                                                        Name</label>
                                                    <input type="text" name="name" id="name"
                                                        class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                        placeholder="Enter course name" required>
                                                </div>

                                                <div>
                                                    <label for="description"
                                                        class="block text-lg font-semibold text-[#4a654f]">Description</label>
                                                    <textarea name="description"
                                                        class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                        rows="3" placeholder="Course description" required></textarea>
                                                </div>

                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="start"
                                                            class="block text-lg font-semibold text-[#4a654f]">Start
                                                            Date</label>
                                                        <input type="datetime-local" id="start" name="start"
                                                            class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                            min="{{ date('Y-m-d\TH:i') }}" required>
                                                    </div>

                                                    <div>
                                                        <label for="end"
                                                            class="block text-lg font-semibold text-[#4a654f]">End
                                                            Date</label>
                                                        <input type="datetime-local" id="end" name="end"
                                                            class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                            min="{{ date('Y-m-d\TH:i') }}" required>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="max_students"
                                                        class="block text-lg font-semibold text-[#4a654f]">Maximum
                                                        Students</label>
                                                    <input type="number" name="max_students" id="max_students"
                                                        class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                        placeholder="Enter maximum number of students" required>
                                                </div>

                                                <div>
                                                    <label for="type"
                                                        class="block text-lg font-semibold text-[#4a654f]">Course
                                                        Type</label>
                                                    <select name="type"
                                                        class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                        required>
                                                        <option value="" disabled selected>Select course type
                                                        </option>
                                                        <option value="free" class="py-2">Free</option>
                                                        <option value="premium" class="py-2">Premium</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="image"
                                                        class="block text-lg font-semibold text-[#4a654f]">Course
                                                        Image</label>
                                                    <div
                                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#F4DFC8] border-dashed rounded-2xl">
                                                        <div class="space-y-1 text-center">
                                                            <svg class="mx-auto h-12 w-12 text-gray-400"
                                                                stroke="currentColor" fill="none"
                                                                viewBox="0 0 48 48">
                                                                <path
                                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <div class="flex text-sm text-gray-600">
                                                                <label for="image"
                                                                    class="relative cursor-pointer rounded-md font-medium text-[#fac365] hover:text-[#e9b74b] focus-within:outline-none">
                                                                    <span>Upload a file</span>
                                                                    <input id="image" name="image"
                                                                        type="file" class="sr-only" required>
                                                                </label>
                                                                <p class="pl-1">or drag and drop</p>
                                                            </div>
                                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-black bg-[#fac365] hover:bg-[#e9b74b] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#fac365] transition-colors duration-200">
                                                        Create Course
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- Course --}}
                        @if (Auth::user()->role == 'student' || Auth::user()->role == 'admin')
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 m-auto pb-10 mt-10 justify-center w-[70vw]">
                                @foreach ($courses->reverse()->sortByDesc('score') as $course)
                                    <div
                                        class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 w-full justify-center items-center">
                                        <div class="relative aspect-[4/3] overflow-hidden">
                                            <img src="{{ asset('storage/' . $course->image) }}"
                                                alt="{{ $course->name }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            <div class="absolute top-4 right-4 z-10">
                                                <button
                                                    class="p-2 rounded-full bg-white/90 backdrop-blur-sm hover:bg-white transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="w-5 h-5">
                                                        <path
                                                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="absolute bottom-4 left-4">
                                                <span
                                                    class="px-3 py-1 rounded-full text-sm font-medium bg-white/90 backdrop-blur-sm text-[#1d1d1d]">
                                                    {{ $course->type }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="p-6">
                                            <h3 class="text-xl font-clash font-semibold mb-4">{{ $course->name }}</h3>

                                            <div class="flex items-center gap-3 mb-4">
                                                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-100">
                                                    <img src="{{ asset('storage/' . $course->user->profile_image) }}"
                                                        alt="{{ $course->user->name }}"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ $course->user->name }}
                                                    </p>
                                                    <p class="text-sm text-gray-500">Mentor</p>
                                                </div>
                                            </div>

                                            @if (Auth::user()->courses->contains($course->id))
                                                <div class="mb-4">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <span class="text-sm font-medium text-gray-700">Progress</span>
                                                        <span
                                                            class="text-sm font-medium text-gray-700">{{ number_format($course->score, 0) }}%</span>
                                                    </div>
                                                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                                                        <div class="bg-[#f9c365] h-1.5 rounded-full transition-all duration-300"
                                                            style="width: {{ $course->score }}%"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="flex items-center justify-between">
                                                @if (Auth::user()->courses->contains($course->id) || Auth::user()->role === 'coach')
                                                    <a href="{{ route('lesson', $course->id) }}"
                                                        class="inline-flex items-center gap-2 text-[#1d1d1d] hover:text-[#f9c365] transition-colors">
                                                        <span class="font-medium">Continue</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="w-4 h-4">
                                                            <path d="m9 18 6-6-6-6" />
                                                        </svg>
                                                    </a>
                                                @endif

                                                @if (Auth::user()->role === 'student')
                                                    @if ($course->isFull())
                                                        <button disabled
                                                            class="px-4 py-2 rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                                                            Course Full
                                                        </button>
                                                    @elseif (Auth::user()->courses->contains($course->id))
                                                        <button disabled
                                                            class="px-4 py-2 rounded-full bg-[#f9c365] text-[#1d1d1d] cursor-not-allowed">
                                                            Enrolled
                                                        </button>
                                                    @else
                                                        @if ($course->type === 'free')
                                                            <form action="{{ route('courses.join', $course->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="px-6 py-2 rounded-full bg-[#1d1d1d] text-[#f9c365] hover:bg-[#2d2d2d] transition-colors">
                                                                    Join Now
                                                                </button>
                                                            </form>
                                                        @elseif ($course->type === 'premium')
                                                            <form action="{{ route('courses.pay', $course->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="px-6 py-2 rounded-full bg-[#f9c365] text-[#1d1d1d] hover:bg-[#e9b74b] transition-colors">
                                                                    Join Premium
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                @endif

                                                @if (auth()->check() && auth()->id() === $course->user_id)
                                                    <form action="{{ route('courses.destroy', $course->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this course?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-700 font-medium transition-colors">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    </div>

</x-app-layout>
