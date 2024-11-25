<x-app-layout>
    <div class="py-12">
        <div class=" w-[70vw] m-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-6">{{ $lesson->nameLesson }}</h1>
                    
                    <div class="aspect-w-16 aspect-h-9">
                        <video controls class="w-full rounded-lg shadow-lg">
                            <source src="{{ asset('storage/' . $lesson->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="mt-6">
                        <a href="{{ url()->previous() }}" 
                           class="inline-block px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                            Back to Course
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>