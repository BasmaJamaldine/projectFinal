<x-app-layout>
    <div class="w-[70vw] ms-8 m-auto">
        <h1 class="font-clash font-medium text-2xl pl-4 text-black">All Courses</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 pb-10 mt-10 justify-center ml-20">
            @foreach ($courses->reverse()->sortByDesc('score') as $course)
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 w-full justify-center items-center">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4 z-10">
                            <button
                                class="p-2 rounded-full bg-white/90 backdrop-blur-sm hover:bg-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
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
                                    alt="{{ $course->user->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $course->user->name }}</p>
                                <p class="text-sm text-gray-500">Mentor</p>
                            </div>
                        </div>
<div class="flex flex-row justify-between">
    <div>
         @if (Auth::user()->name === $course->user->name)
    <a href="{{ route('lesson', $course->id) }}"
        class="inline-flex items-center gap-2 text-[#1d1d1d] hover:text-[#f9c365] transition-colors">
        <span class="font-medium">Continue</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="w-4 h-4">
            <path d="m9 18 6-6-6-6" />
        </svg>
    </a>
@endif
    </div>
 <div>@if (auth()->check() && auth()->id() === $course->user_id)
<form action="{{ route('courses.destroy', $course->id) }}" method="POST"
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
                                <form action="{{ route($course->type === 'free' ? 'courses.join' : 'courses.pay', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-6 py-2 rounded-full {{ $course->type === 'free' ? 'bg-[#1d1d1d] text-[#f9c365] hover:bg-[#2d2d2d]' : 'bg-[#f9c365] text-[#1d1d1d] hover:bg-[#e9b74b]' }} transition-colors">
                                        {{ $course->type === 'free' ? 'Join Now' : 'Join Premium' }}
                                    </button>
                                </form>
                            @endif
                        @endif

                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
