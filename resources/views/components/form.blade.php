<section class="max-w-4xl p-6 mx-auto mt-16 bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Todo</h2>

    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="grid gap-6 mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">Title</label>
                <input id="title" name="title" value="{{ old('title', $todo->title) }}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            @error ('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                <textarea id="description" name="description" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">{{ old('description', $todo->description) }}</textarea>
            </div>
            @error ('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end mt-6">
            <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section>
