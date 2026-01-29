<x-layouts.auth title="Create Todo">
  <x-container>
    <x-todo-form title="Create Todo" :action="route('todos.store')" method="POST" />
  </x-container>
</x-layouts.auth>
@if ($errors->any())
  <x-alerts.error-pop class="absolute bottom-10 right-10">
    Your Todo could not be created!
  </x-alerts.error-pop>
@endif
