<x-app-layout>
    <button id="show" class="hidden bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition"
    onclick="openModal('showcourse')">
    Create course
</button>


<!-- Modal for course details -->
<div id="showcourse" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto shadow-xl rounded-md bg-white max-w-md">
        <div class="flex justify-end p-2">
            <button onclick="closeModal('showcourse')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div id="div" class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md space-y-4">
            <h1 id="name" class="text-2xl font-bold text-gray-800"></h1>
            <h1 id="description" class="text-sm text-gray-600"></h1>
            <h1 id="place" class="text-lg text-gray-700"></h1>

            <form id="free_form" method="POST">
                @csrf
                <button id="tranzabadan" type="submit"
                    class="btn btn-success">Rejoindre</button>
            </form>
      
          

        </div>
    </div>
</div>
<script type="text/javascript">
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
</script>

<div class="w-full h-[90vh] bg-white rounded-3xl border-none p-3" id="calendar"></div>
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
                // console.log(info.event);
                
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
                    free_form.action = `/courses/join/${info.event._def.publicId}`
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

</x-app-layout>