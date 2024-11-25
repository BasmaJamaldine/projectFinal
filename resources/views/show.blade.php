<x-app-layout>
    <div class="min-h-screen bg-[#fef7e4] py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h1 class="text-4xl font-clash font-semibold mb-4">
                            <span class="bg-[#f9c365] px-4 py-1 rounded-full">{{ $finalProject->title }}</span>
                        </h1>
                    </div>

                    <!-- Project Questions -->
                    <form action="{{ route('final-project.submit', $finalProject->id) }}" method="POST" class="space-y-8">
                        @csrf

                        @foreach($questions as $question)
                            <div class="bg-[#fef7e4] rounded-2xl p-6">
                                <h3 class="text-xl font-semibold mb-4">{{ $question->question }}</h3>
                                
                                <div class="space-y-4">
                                    @php
                                        $answers = collect([
                                            'true' => $question->correct_answer,
                                            'false' => $question->incorrect_answer,
                                        ])->shuffle();
                                    @endphp

                                    @foreach($answers as $type => $answer)
                                        <label class="flex items-center space-x-3 cursor-pointer group">
                                            <input type="radio" 
                                                   name="question_{{ $question->id }}" 
                                                   value="{{ $answer }}"
                                                   class="form-radio h-5 w-5 text-[#f9c365] border-2 border-[#f9c365] focus:ring-[#f9c365]"
                                                   required>
                                            <span class="text-gray-700 group-hover:text-[#f9c365] transition-colors">
                                                {{ $answer }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                    class="bg-[#f9c365] text-[#1d1d1d] px-8 py-3 rounded-full hover:bg-[#e9b74b] transition-colors flex items-center">
                                Submit Final Project
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>