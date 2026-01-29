<x-layouts.auth title="Edit Todo">
  <x-container>
    <x-todo-form :todo="$todo" title="Edit Todo" :action="route('todos.update', $todo)" method="PATCH" />
  </x-container>
</x-layouts.auth>
@if ($errors->any())
  <x-alerts.error-pop class="absolute bottom-10 right-10">
    Your Todo could not be edited!
  </x-alerts.error-pop>
@endif
