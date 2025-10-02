<x-layout>
  <h1 class="my-10 text-center text-4xl font-medium text-lime-900">
    Sign in to your account
  </h1>

  <x-card class="py-8 px-16">
    {{-- Bendras auth klaidos pranešimas (iš kontrolerio -> with('error', ...)) --}}
    @if (session('error'))
      <div class="mb-6 rounded-md bg-red-50 p-4 text-sm text-red-700">
        {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('auth.store') }}" method="POST" novalidate>
      @csrf

      {{-- E-mail --}}
      <div class="mb-6">
        <label for="email" class="mb-2 block text-sm font-medium text-slate-900">
          E-mail
        </label>
        <x-text-input
          name="email"
          id="email"
          type="email"
          :value="old('email')"
          autocomplete="email"
        />
        @error('email')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-6">
        <label for="password" class="mb-2 block text-sm font-medium text-slate-900">
          Password
        </label>
        <x-text-input
          name="password"
          id="password"
          type="password"
          autocomplete="current-password"
        />
        @error('password')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember + Register link --}}
      <div class="mb-8 flex items-center justify-between text-sm font-medium">
        <label for="remember" class="inline-flex items-center space-x-2">
          <input
            id="remember"
            type="checkbox"
            name="remember"
            class="rounded-sm border border-slate-400"
          />
          <span>Remember me</span>
        </label>

        <div>
          Not registered yet?
          <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
            Create account
          </a>
        </div>
      </div>

      <x-button type="submit" class="w-full bg-teal-50">Login</x-button>
    </form>
  </x-card>
</x-layout>
