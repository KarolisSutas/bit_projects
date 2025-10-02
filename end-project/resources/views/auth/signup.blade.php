<x-layout>
  <h1 class="my-10 text-center text-4xl font-medium text-lime-900">Register</h1>

  <x-card class="py-8 px-16">
    <form action="{{ route('register.store') }}" method="POST" novalidate>
      @csrf

      <div class="mb-6">
        <label for="name" class="mb-2 block text-sm font-medium text-slate-900">Name</label>
        <x-text-input name="name" id="name" :value="old('name')" />
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="mb-2 block text-sm font-medium text-slate-900">E-mail</label>
        <x-text-input name="email" id="email" type="email" :value="old('email')" />
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Password</label>
        <x-text-input name="password" id="password" type="password" />
        @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mb-8">
        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-900">
          Confirm Password
        </label>
        <x-text-input name="password_confirmation" id="password_confirmation" type="password" />
      </div>

      <x-button type="submit" class="w-full bg-teal-50">Create account</x-button>
    </form>
  </x-card>
</x-layout>
