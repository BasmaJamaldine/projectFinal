<x-app-layout>
    <div class="ms-[15vw] min-h-screen bg-white">
    
        <!-- Courses Grid -->
        <div class="w-[70vw] mx-auto mt-10">
            @if($enrolledCourses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($enrolledCourses as $course)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="flex justify-between items-start mb-4">
                                <!-- Course Title -->
                                <h3 class="text-xl  font-clash font-semibold">{{ $course->name }}</h3>
                                
                                <!-- Course Type Badge -->
                                <span class="px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-[#f9c365] text-bold">
                                    {{ $course->type }}
                                </span>
                            </div>

                            <!-- Instructor Info -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $course->user->profile_image) }}" 
                                         alt="{{ $course->user->name }}"
                                         class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $course->user->name }}</p>
                                    <p class="text-sm text-gray-500">Instructor</p>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Progress</span>
                                    <span class="text-sm font-medium text-gray-700">{{ number_format($course->score, 0) }}%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-1.5">
                                    <div class="bg-[#f9c365] h-1.5 rounded-full transition-all duration-300"
                                        style="width: {{ $course->score }}%"></div>
                                </div>
                            </div>

                            <!-- Students -->
                            <div class="flex items-center mb-4">
                                <div class="flex -space-x-2">
                                    @foreach ($course->students->take(3) as $student)
                                        <img src="{{ asset('storage/' . $student->profile_image) }}" alt="{{ $student->name }}"
                                            title="{{ $student->name }}"
                                            class="w-8 h-8 rounded-full border-2 border-white" />
                                    @endforeach
                                </div>
                                <span class="text-sm text-gray-500 ml-2">
                                    +{{ $course->students->count() }} students
                                </span>
                            </div>

                            <!-- Continue Button -->
                            <div class="flex justify-end">
                                <a href="{{ route('lesson', $course->id) }}" 
                                   class="inline-flex items-center px-6 py-2 rounded-full bg-[#1d1d1d] text-[#f9c365] hover:bg-[#2d2d2d] transition-colors">
                                    <span>Continue</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="mb-6">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-clash font-medium text-gray-900 mb-2">No Enrolled Courses</h3>
                    <p class="text-gray-600 mb-6">Start your learning journey by enrolling in a course</p>
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-6 py-3 rounded-full bg-[#f9c365] text-[#1d1d1d] hover:bg-[#e9b74b] transition-colors">
                        Browse Courses
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
    </div>
</x-app-layout>