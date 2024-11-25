<x-app-layout>
    <div class="w-[70vw] m-auto ">
            <div class="container mx-auto px-4 py-8">
                <!-- Create Course Button -->
                <button id="show" class="hidden fixed bottom-8 right-8 bg-[#f9c365] hover:bg-[#e9b74b] text-black rounded-full px-6 py-3 font-medium transition duration-300 transform hover:scale-105 shadow-lg items-center gap-2"
                    onclick="openModal('showcourse')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create Course
                </button>
        
                <!-- Course Details Modal -->
                <div id="showcourse" class="fixed hidden z-50 inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full px-4">
                    <div class="relative top-20 mx-auto shadow-2xl rounded-3xl bg-white max-w-md transform transition-all">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('showcourse')" class="text-gray-400 hover:text-gray-600 transition duration-150">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
        
                        <div id="div" class="p-8 space-y-6">
                            <h1 id="name" class="text-3xl font-clash font-bold text-gray-900"></h1>
                            <div class="bg-[#fef7e4] rounded-2xl p-6">
                                <h2 class="text-lg font-medium text-gray-700 mb-2">About the Course</h2>
                                <p id="description" class="text-gray-600"></p>
                            </div>
                            <div class="bg-[#fef7e4] rounded-2xl p-6">
                                <h2 class="text-lg font-medium text-gray-700 mb-2">Availability</h2>
                                <p id="place" class="text-gray-600"></p>
                            </div>
        
                            <form id="free_form" method="POST" class="mt-8">
                                @csrf
                                <button id="tranzabadan" type="submit"
                                    class="w-full bg-[#f9c365] hover:bg-[#e9b74b] text-black font-medium rounded-full px-8 py-3 transition duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                                    <span>Rejoindre</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
        
                <!-- Calendar -->
                <div class="bg-white rounded-3xl shadow-xl p-6 mt-4">
                    <div id="calendar" class="min-h-[80vh]"></div>
                </div>
            </div>
        
            <script>
                window.openModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'block';
                    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
                };
        
                window.closeModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'none';
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
                };
        
                document.onkeydown = function(event) {
                    event = event || window.event;
                    if (event.keyCode === 27) {
                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
                        let modals = document.getElementsByClassName('modal');
                        Array.prototype.slice.call(modals).forEach(i => {
                            i.style.display = 'none';
                        });
                    }
                };
        
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
                            listDay: { buttonText: 'Day Events' },
                            listWeek: { buttonText: 'Week Events' },
                            listMonth: { buttonText: 'Month Events' },
                            timeGridWeek: { buttonText: 'Week' },
                            timeGridDay: { buttonText: "Day" },
                            dayGridMonth: { buttonText: "Month" },
                        },
                        initialView: "timeGridWeek",
                        slotMinTime: "09:00:00",
                        slotMaxTime: "19:00:00",
                        nowIndicator: true,
                        selectable: true,
                        selectMirror: true,
                        selectOverlap: false,
                        weekends: true,
                        editable: true,
                        droppable: true,
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
        
                            name.textContent = info.event._def.title;
                            description.textContent = a.description;
                            place.textContent = `${a.places} places available`;
                            
                            if (eventStartTime <= nowDate && eventEndTime >= nowDate) {
                                free_form.action = `/courses/join/${info.event._def.publicId}`
                                tranzabadan.textContent = "Take the course";
                                tranzabadan.classList.remove('cursor-not-allowed', 'bg-gray-400');
                                tranzabadan.classList.add('bg-[#f9c365]', 'hover:bg-[#e9b74b]');
                            } else {
                                tranzabadan.type = "button";
                                tranzabadan.textContent = "The course is not available";
                                tranzabadan.classList.remove('bg-[#f9c365]', 'hover:bg-[#e9b74b]');
                                tranzabadan.classList.add('bg-gray-400', 'cursor-not-allowed');
                            }
                        },
                        selectAllow: (info) => {
                            return info.start >= nowDate;
                        },
                        select: (info) => {
                            if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                                return
                            }
        
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
                });
            </script>

    </div>
    
</x-app-layout>