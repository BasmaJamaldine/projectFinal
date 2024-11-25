<x-app-layout>
    <div class=" mt-15 w-[70vw] m-auto ">

        <div class=" m-auto sm:px-6 lg:px-8">
         
            <div class="bg-white w-[80vw] overflow-hidden shadow-xl rounded-3xl">
                <div class="p-8 flex flex-col md:flex-row justify-between gap-12">
                    <!-- Course Information -->
                    <div class="md:w-1/3">
                        <h1 class="text-3xl font-clash font-semibold text-[#fac365]">{{ $course->name }}</h1>
                        <div class="relative h-48 w-full mt-6 rounded-2xl overflow-hidden">
                            <img src="{{ asset('storage/' . $course->image) }}" 
                                 alt="{{ $course->name }}" 
                                 class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="mt-6">
                            <p class="text-lg text-gray-600">{{ $course->description }}</p>
                            <div class="mt-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-[#fef7e4]">
                                    <img src="{{ asset('storage/' . $course->user->avatar) }}" 
                                         alt="{{ $course->user->name }}"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($course->user->name) }}'">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $course->user->name }}</p>
                                    <p class="text-sm text-[#fac365]">Mentor</p>
                                </div>
                               
                            </div>
                            <div class="flex items-center mb-4 mt-5">
                                <div class="flex -space-x-2">
                                    @foreach ($course->students as $student)
                                        <img src="{{ asset('storage/' . $student->profile_image) }}" alt="{{ $student->name }}"
                                            title="{{ $student->name }}"
                                            class="w-8 h-8 rounded-full border-2 border-white" />
                                    @endforeach
                                </div>
                                <span class="text-sm text-gray-500 ml-2">
                                    +{{ $course->students->count() }} students
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Lessons Section -->
                    <div class="md:w-2/3">
                        @if (Auth::user()->role === 'coach')
                            <button type="button" 
                                    class="mb-6 px-6 py-3 bg-[#1d1d1d] text-[#fac365] rounded-full hover:bg-[#2d2d2d] transition-colors font-medium flex items-center gap-2" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#lessonModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add New Lesson
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="lessonModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-white rounded-3xl shadow-2xl">
                                        <div class="modal-header border-b border-[#fac365] p-6">
                                            <h5 class="text-2xl font-clash font-semibold text-gray-900">Create New Lesson</h5>
                                            <button type="button" class="text-gray-400 hover:text-[#fac365] transition-colors" data-bs-dismiss="modal">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body p-6">
                                                <div class="mb-6">
                                                    <label class="block text-lg font-semibold text-[#4a654f] mb-2">
                                                        Lesson Name
                                                    </label>
                                                    <input type="text" 
                                                           name="nameLesson" 
                                                           class="mt-1 block w-full rounded-2xl border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D] focus:ring focus:ring-[#fac365] focus:ring-opacity-50 py-2 px-3"
                                                           required>
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                </div>
                                                <div class="mb-6">
                                                    <label class="block text-lg font-semibold text-[#4a654f] mb-2">
                                                        Video File
                                                    </label>
                                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#F4DFC8] border-dashed rounded-2xl">
                                                        <div class="space-y-1 text-center">
                                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <div class="flex text-sm text-gray-600">
                                                                <label class="relative cursor-pointer rounded-md font-medium text-[#fac365] hover:text-[#e9b74b]">
                                                                    <span>Upload a video</span>
                                                                    <input type="file" name="file" accept="video/*" class="sr-only" required>
                                                                </label>
                                                                <p class="pl-1">or drag and drop</p>
                                                            </div>
                                                            <p class="text-xs text-gray-500">MP4, WebM up to 100MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer flex justify-end gap-4 p-6">
                                                <button type="button" 
                                                        class="px-6 py-3 border-2 border-[#1d1d1d] text-[#1d1d1d] rounded-full hover:bg-[#1d1d1d] hover:text-[#fac365] transition-colors font-medium"
                                                        data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" 
                                                        class="px-6 py-3 bg-[#1d1d1d] text-[#fac365] rounded-full hover:bg-[#2d2d2d] transition-colors font-medium">
                                                    Create Lesson
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Lessons List -->
                        <div class="space-y-4">
                            @foreach ($lessons as $lesson)
                                <div class="p-6 border-2 border-[#F4DFC8] rounded-2xl {{ $lesson->accessible ? 'bg-white' : 'bg-[#fef7e4]' }} hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-center justify-between">
                                        <h2 class="text-xl text-gray-900 font-clash font-semibold">{{ $lesson->nameLesson }}</h2>
                                        @if($lesson->completed)
                                            <div class="bg-[#fef7e4] p-2 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#fac365]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($lesson->accessible)
                                        @if ($lesson->file)
                                            <a href="{{ route('lesson.show', $lesson->id) }}" 
                                               class="mt-4 inline-flex items-center px-6 py-3 text-[#1d1d1d] bg-[#fac365] rounded-full hover:bg-[#2d2d2d] hover:text-[#fac365] transition-colors font-medium gap-2">
                                                {{ $lesson->completed ? 'Review Lesson' : 'Start Lesson' }}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                        @endif
                                    @else
                                        <p class="mt-4 text-gray-500 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                            Complete the previous lesson to unlock
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Final Project Section -->
                        @if(Auth::user()->hasCompletedAllLessons($course))
                            <div class="mt-8 p-6 bg-[#fef7e4] rounded-2xl border-2 border-[#fac365]">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-2xl font-clash font-semibold text-gray-900">Final Project Available!</h2>
                                    <div class="bg-[#fac365] p-2 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#1d1d1d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-6">
                                    Congratulations! You've completed all the lessons. Test your knowledge with the final project assessment.
                                </p>
                                <a href="{{ route('final-project.start', ['course' => $course->id]) }}" 
                                   class="inline-flex items-center px-6 py-3 bg-[#1d1d1d] text-[#fac365] rounded-full hover:bg-[#2d2d2d] transition-colors font-medium gap-2">
                                    Start Final Project
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>