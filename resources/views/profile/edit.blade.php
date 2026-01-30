<x-layouts.auth title="Edit Profile">
  <x-container>
    <div x-data="{ showDeleteModal: {{ $errors->userDeletion->any() ? 'true' : 'false' }} }">
      <x-form :title="'Edit Profile'" action="{{ route('profile.update') }}" method="PATCH">
        <div>
          <x-form-label for="name">Name</x-form-label>
          <x-form-input name="name" type="text" :value="old('name', auth()->user()->name)" required />
        </div>
        <x-input-error :messages="$errors->get('name')" />
        <div>
          <x-form-label for="email">Email</x-form-label>
          <x-form-input name="email" type="email" :value="old('email', auth()->user()->email)" required />
        </div>
        <x-input-error :messages="$errors->get('email')" />
        <div class="flex items-center justify-end space-x-4 mt-6">
          <x-buttons.trash @click.prevent="showDeleteModal = true" />
          <x-buttons.secondary>Save</x-buttons.secondary>
        </div>
      </x-form>
      <x-modals.delete-account />
    </div>
  </x-container>
</x-layouts.auth>
@if ($errors->any())
  <x-alerts.error-pop class="absolute bottom-10 right-10">
    Your Profile could not be edited!
  </x-alerts.error-pop>
@endif
@if (session('status'))
  <x-alerts.success-pop class="absolute bottom-10 right-10">
    Your Profile was updated successfully!
  </x-alerts.success-pop>
@endif
