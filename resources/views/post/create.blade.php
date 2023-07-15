<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <h1 class="text-3xl font-semibold mb-4">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                       class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">body</label>
                <textarea name="body" id="body" class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                          rows="6"></textarea>
            </div>

            <div class="flex justify mx-auto-end">
                <div class="flex items-center gap-4">
                    <x-primary-button class="mr-1">{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
