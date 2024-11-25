<x-app-layout>
    <div class="min-h-screen bg-[#fef7e4] py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="p-8">
                 
                    <div class="mb-6">
                        <a href="{{ route('lesson', $lesson->course->id) }}" 
                           class="inline-flex items-center text-gray-600 hover:text-[#f9c365] transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Course
                        </a>
                    </div>

                    <!-- Lesson Title -->
                    <h1 class="font-clash text-4xl font-semibold mb-8">
                        <span class="bg-[#f9c365] px-4 py-1 rounded-full">{{ $lesson->nameLesson }}</span>
                    </h1>

                    <!-- Video Player -->
                    <div class="relative rounded-2xl overflow-hidden bg-black shadow-2xl mb-8">
                        <div class="aspect-w-16 aspect-h-9">
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ asset('storage/' . $lesson->file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center mt-8">
                        @if($previousLesson)
                            <a href="{{ route('lesson.show', $previousLesson->id) }}" 
                               class="bg-[#1d1d1d] text-[#f9c365] px-6 py-3 rounded-full hover:bg-[#2d2d2d] transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Previous Lesson
                            </a>
                        @else
                            <div></div>
                        @endif

                        @if($nextLesson)
                            <a href="{{ route('lesson.show', $nextLesson->id) }}" 
                               class="bg-[#f9c365] text-[#1d1d1d] px-6 py-3 rounded-full hover:bg-[#fac365] transition-colors flex items-center">
                                Next Lesson
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('courses', $lesson->course->id) }}" 
                               class="bg-[#f9c365] text-[#1d1d1d] px-6 py-3 rounded-full hover:bg-[#fac365] transition-colors flex items-center">
                                Complete Course
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Additional Resources Section -->
            <div class="mt-8 bg-white rounded-3xl shadow-xl p-8">
                <h2 class="font-clash text-2xl font-semibold mb-6">Additional Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center p-4 bg-[#fef7e4] rounded-2xl">
                        <div class="bg-[#f9c365] p-3 rounded-full mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Course Materials</h3>
                            <p class="text-sm text-gray-600">Download supplementary materials</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-[#fef7e4] rounded-2xl">
                        <div class="bg-[#f9c365] p-3 rounded-full mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Schedule</h3>
                            <p class="text-sm text-gray-600">View course timeline</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>