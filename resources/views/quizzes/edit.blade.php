<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Quiz
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <form method="POST"
                  action="{{ route('quizzes.update', $quiz) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Quiz Title</label>
                    <input type="text" name="title"
                        class="w-full border rounded p-2"
                        value="{{ $quiz->title }}"
                        required>
                </div>

                <!-- Subject -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Subject</label>
                    <input type="text" name="subject"
                        class="w-full border rounded p-2"
                        value="{{ $quiz->subject }}">
                </div>

                <!-- Grade -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Grade</label>
                    <input type="text" name="grade"
                        class="w-full border rounded p-2"
                        value="{{ $quiz->grade }}">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-2">
                    <a href="{{ route('quizzes.index') }}"
                       class="px-4 py-2 border rounded">
                        Cancel
                    </a>

                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded">
                        Update Quiz
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
