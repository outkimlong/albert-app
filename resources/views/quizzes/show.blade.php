<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manage Quiz: {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto relative bg-slate-900 rounded-xl overflow-hidden mb-10">
        <x-primary-button>
            <a href="{{ route('questions.create', $quiz) }}">
                {{ __('+ Add Question') }}
            </a>
        </x-primary-button>
        <img src="{{ asset('storage/img/people.png') }}"
            class="absolute right-0 bottom-0 h-full opacity-20 pointer-events-none">
        <!-- QUESTIONS LIST -->
        <div class="mt-6 space-y-4">
            @foreach($quiz->questions as $question)
                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ $question->question_text }}
                    </p>

                    @if($question->question_latex)
                        <x-latex :value="$question->question_latex" class="mt-2 dark:text-gray-200 leading-tight" />
                    @endif
                    
                    <div class="mt-3 flex gap-3">
                        <a href="{{ route('questions.edit', $question) }}" class="text-blue-600">
                            Edit
                        </a>
                        <form method="POST"
                              action="{{ route('questions.destroy', $question) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
