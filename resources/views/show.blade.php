<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold mb-6">{{ $finalProject->title }}</h1>
        
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <p class="text-gray-700">{{ $finalProject->description }}</p>
            </div>
        
            <form action="{{ route('projetfinal.submit', ['finalProject' => $finalProject->id]) }}" method="POST">
                @csrf
        
                @foreach ($finalProject->questions as $question)
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <p class="text-lg font-semibold mb-4">{{ $question->question }}</p>
                        
                        <div class="space-y-3">
                            @php
                                $answers = collect([
                                    'true' => $question->correct_answer,   
                                    'false' => $question->incorrect_answer,  
                                ])->shuffle();
                            @endphp
        
                            @foreach ($answers as $answerType => $answerText)
                                <div class="flex items-center">
                                    <input 
                                        type="radio" 
                                        name="question_{{ $question->id }}" 
                                        id="answer_{{ $loop->index }}_{{ $question->id }}" 
                                        value="{{ $answerText }}" 
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" 
                                        required
                                    >
                                    <label 
                                        for="answer_{{ $loop->index }}_{{ $question->id }}" 
                                        class="ml-3 block text-gray-700"
                                    >
                                        {{ $answerText }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
        
                <div class="flex justify-center mt-8">
                    <button 
                       type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition duration-200"
                    >
                        Soumettre le projet final
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
