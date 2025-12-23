<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Question — {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        <div class="p-6 rounded shadow">
            <form method="POST" action="{{ route('questions.update', $question) }}">
                @csrf
                @method('PUT')
                <textarea name="question_text" class="w-full border p-2 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="Question text">{{ $question->question_text }}</textarea>
                <textarea rows="5" id="latexInput" name="question_latex" class="w-full border p-2 rounded mt-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="LaTeX formula">{{ old('question_latex', $question->question_latex) }}</textarea>

                {{-- LIVE PREVIEW --}}
                <div class="mb-4 mt-4">
                    <div style="font-family: 'Noto Sans Khmer'; font-size: 16px;" id="latexPreview" 
                        class="border rounded-md p-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 min-h-[100px] text-lg ">
                    </div>
                </div>
                
                <x-primary-button class="mt-4 px-4 py-2 rounded">
                    {{ __('Update Question') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    {{-- KATEX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.css">
    <script src="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.js"></script>

    <script>
        const textarea = document.getElementById('latexInput');
        const preview = document.getElementById('latexPreview');
        function renderLatex() {
            preview.innerHTML = '';
            try {
                katex.render(textarea.value, preview, {
                    throwOnError: false
                });
            } catch (e) {
 
            }
        }
        textarea.addEventListener('input', renderLatex);
        renderLatex();
    </script>
</x-app-layout>
