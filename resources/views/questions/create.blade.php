<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add Question</h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto">
        <form method="POST" action="{{ route('questions.store', $quiz) }}">
            @csrf

            <textarea name="question_text" class="w-full border p-2 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="Question text"></textarea>
            <textarea rows="5" id="latexInput" name="question_latex" class="w-full border p-2 rounded mt-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="LaTeX formula"></textarea>
            <!-- Live Preview -->
            <div class="mb-4 mt-4">
                <div style="font-family: 'Noto Sans Khmer'; font-size: 16px;" id="latexPreview" 
                    class="border rounded-md p-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 min-h-[100px] text-lg ">
                </div>
            </div>
            <x-primary-button class="mt-4 px-4 py-2 rounded">
                {{ __('Save Question') }}
            </x-primary-button>
        </form>
    </div>
    <!-- MathJax -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js"></script>
    <script>
        const input = document.getElementById('latexInput');
        const preview = document.getElementById('latexPreview');

        input.addEventListener('input', () => {
            preview.innerHTML = `$$${input.value}$$`;
            MathJax.typesetPromise([preview]);
        });
    </script> --}}


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
