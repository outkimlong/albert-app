
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Quizzes</h2>
    </x-slot>

    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button>
                <a href="{{ route('quizzes.create') }}">
                    {{ __('+ New Quiz') }}
                </a>
            </x-primary-button>
        </div>
        <table class="max-w-7xl mx-auto mt-4 w-full bg-white dark:bg-gray-800 rounded shadow">
            @foreach ($quizzes as $quiz)
                <tr class="border-b">
                    <td class="p-3 text-gray-900 dark:text-gray-100">{{ $quiz->title }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('quizzes.show', $quiz) }}" class="text-blue-600">Manage</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <img src="{{ asset('storage/img/undraw_artificial-intelligence_43qa.svg') }}"
         class="absolute right-0 bottom-0 h-full opacity-20 pointer-events-none">
</x-app-layout>
