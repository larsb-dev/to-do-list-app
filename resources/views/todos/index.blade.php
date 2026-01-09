<x-layout :title="$title">
    <x-container>
        <h1 class="text-3xl dark:text-blue-400 text-gray-700 my-10 font-bold tracking-wide">
            @if ($todos->isNotEmpty())
                You have {{ $todos->count() }} {{ Str::plural('ToDo', $todos->count()) }}
            @else
                You're done for the day
            @endif
        </h1>
        <div x-data="{
            showModal: @if ($errors->any()) true @else false @endif,
            editingTodo: @if ($errors->any()) {{ Js::from(old()) }} @else null @endif,
            toggle(todo) {
                this.editingTodo = todo;
                this.showModal = !this.showModal;
            }
        }">
            <div @foo="toggle($event.detail)" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($todos as $todo)
                    <x-card :todo="$todo" />
                @endforeach
                <div x-show="showModal">
                    <div class="absolute top-0 m-auto left-0 w-full h-full bg-black/50 backdrop-blur-sm">
                        <div class="absolute inset-0 m-auto w-3/4 h-3/4 bg-white shadow-lg rounded-md">
                            <div class="p-6">
                                <h2 class="text-xl mb-4">Edit Todo</h2>

                                <form :action="`/todos/${editingTodo?.id}`" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="text"
                                        name="title"
                                        x-model="editingTodo.title"
                                        class="w-full border p-2 mb-3"
                                    >
                                    @error('title')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <textarea
                                        name="description"
                                        x-model="editingTodo.description"
                                        class="w-full border p-2 mb-3"
                                    ></textarea>

                                    <div class="flex justify-between">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            Save
                                        </button>
                                        <button type="button" @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded">
                                            Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
