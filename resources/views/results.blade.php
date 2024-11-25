<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8 {{ $passed ? 'bg-green-50' : 'bg-red-50' }}">
                    <div class="flex justify-center mb-8">
                        @if($passed)
                            <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        @else
                            <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h1 class="text-3xl font-bold text-center mb-4">
                        {{ $passed ? 'Félicitations !' : 'Pas encore réussi' }}
                    </h1>

                    <div class="text-center mb-8">
                        <p class="text-xl text-gray-600">
                            {{ $passed 
                                ? 'Vous avez réussi le projet final !' 
                                : 'Continuez vos efforts !' 
                            }}
                        </p>
                    </div>

                     <div class="bg-white rounded-lg p-6 shadow-sm mb-8">
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="text-center">
                                <p class="text-sm text-gray-500 mb-1">Score obtenu</p>
                                <p class="text-3xl font-bold {{ $passed ? 'text-green-600' : 'text-red-600' }}">
                                    {{ number_format($score, 1) }}%
                                </p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-gray-500 mb-1">Questions correctes</p>
                                <p class="text-3xl font-bold text-gray-700">
                                    {{ $correctAnswers }}/{{ $totalQuestions }}
                                </p>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div 
                                class="h-3 rounded-full {{ $passed ? 'bg-green-500' : 'bg-red-500' }}" 
                                style="width: {{ $score }}%"
                            ></div>
                        </div>
                    </div>

                     <div class="flex justify-center space-x-4">
                        @if(!$passed && isset($finalProject))
                        {{-- <form 
                        action="{{ route('final-project.start', ['course' => $course->id]) }}" 
                        method="POST">
                        @csrf 
                        <button 
                            type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200"
                        >
                            Réessayer
                        </button> 
                    </form>--}}
                        @endif
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-200"
                        >
                            Tableau de bord
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>