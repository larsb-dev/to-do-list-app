<div x-show="showDeleteModal" x-cloak class="fixed inset-0 bg-black/50 backdrop-blur-xs z-40 border-2 border-red-600">
  <x-form title="Delete Account" action="{{ route('profile.destroy') }}" method="DELETE">
    <div>
      <x-form-label for="password">Password</x-form-label>
      <x-form-input name="password" type="password" required />
    </div>
    <x-input-error :messages="$errors->userDeletion->get('password')" />
    <div class="flex items-center justify-end space-x-4 mt-6">
      <x-links.outline :primary="false" href="{{ route('profile.edit') }}">Cancel</x-links.outline>
      <x-buttons.danger>Delete</x-buttons.danger>
    </div>
  </x-form>
</div>
@if ($errors->userDeletion->any())
  <x-alerts.error-pop class="absolute bottom-10 right-10 z-50">
    Your Account could not be deleted!
  </x-alerts.error-pop>
@endif
