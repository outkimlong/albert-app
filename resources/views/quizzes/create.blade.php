<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Create Quiz</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('quizzes.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Quiz Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                            placeholder="e.g. Coordinate Geometry" />
                    </div>
                    <div>
                        <x-input-label for="subject" :value="__('Subject')" />
                        <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full"
                            placeholder="Math / Chemistry / Physics" />
                    </div>
                    <div>
                        <x-input-label for="grade" :value="__('Grade')" />
                        <x-text-input id="grade" name="grade" type="text" class="mt-1 block w-full"
                            placeholder="Grade 9 / 10 / 11" />
                    </div>
                    <div class="flex items-center gap-4 pt-6">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
