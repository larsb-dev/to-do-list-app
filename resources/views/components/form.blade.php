@php
    $commonStyles = 'block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring';
@endphp


<section class="max-w-4xl p-6 mx-auto mt-16 bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">{{ $title }}</h2>

    <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)

        <div class="grid gap-6 mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">Title</label>
                <input id="title" name="title" value="{{ old('title', $todo?->title) }}" class="{{ $commonStyles }}">
            </div>
            @error ('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                <textarea id="description" name="description" class="{{ $commonStyles }}">{{ old('description', $todo?->description) }}</textarea>
            </div>
            @error ('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="status">Status</label>
                <select class="{{ $commonStyles }}" name="status" id="status">
{{--                    @for each statuses as status--}}
                    <option value="not_started" @selected($todo?->status === 'completed')>Not Started</option>
                    <option @selected($todo?->status === 'completed') value="in_progress">In Progress</option>
                    <option value="{{ Status::COMPLETED }}" @selected($todo?->status === Status::COMPLETED)>Completed</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <x-buttons.filled :primary="false">Save</x-buttons.filled>
        </div>
    </form>
</section>
