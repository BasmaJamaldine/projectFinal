<x-app-layout>
    <div class="min-h-screen bg-[#fef7e4] py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <div class="p-8 {{ $passed ? 'bg-[#fef7e4]' : 'bg-red-50' }}">
                        <div class="flex justify-center mb-8">
                            @if($passed)
                                <div class="w-24 h-24 rounded-full bg-[#f9c365] flex items-center justify-center">
                                    <svg class="w-14 h-14 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-14 h-14 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <h1 class="text-4xl font-clash font-semibold text-center mb-4">
                            {{ $passed ? 'Félicitations !' : 'Pas encore réussi' }}
                        </h1>

                        <div class="text-center mb-12">
                            <p class="text-2xl text-gray-600">
                                {{ $passed 
                                    ? 'Vous avez réussi le projet final !' 
                                    : 'Continuez vos efforts !' 
                                }}
                            </p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-sm mb-8 border-2 border-[#f9c365]">
                            <div class="grid grid-cols-2 gap-8 mb-6">
                                <div class="text-center">
                                    <p class="text-sm font-medium text-gray-500 mb-2">Score obtenu</p>
                                    <p class="text-4xl font-clash font-bold {{ $passed ? 'text-[#f9c365]' : 'text-red-500' }}">
                                        {{ number_format($score, 1) }}%
                                    </p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm font-medium text-gray-500 mb-2">Questions correctes</p>
                                    <p class="text-4xl font-clash font-bold text-gray-800">
                                        {{ $correctAnswers }}/{{ $totalQuestions }}
                                    </p>
                                </div>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div 
                                    class="h-4 rounded-full {{ $passed ? 'bg-[#f9c365]' : 'bg-red-500' }}" 
                                    style="width: {{ $score }}%"
                                ></div>
                            </div>
                        </div>

                        <div class="flex justify-center space-x-6">
                            @if(!$passed && isset($finalProject))
                                <button 
                                    type="submit" 
                                    class="bg-[#f9c365] hover:bg-[#e9b74b] text-black px-8 py-3 rounded-full font-medium transition duration-300 transform hover:scale-105"
                                >
                                    Réessayer
                                </button>
                            @endif
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="bg-black hover:bg-gray-800 hover:text-white text-[#f9c365] px-8 py-3 rounded-full font-medium transition duration-300 transform hover:scale-105 flex items-center"
                            >
                                Tableau de bord
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>