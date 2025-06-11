<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="bg-white shadow-xl rounded-xl w-full max-w-md p-6 sm:p-8">
    <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-6">
      Welcome Back <span class="inline-block">👋</span>
    </h2>

    <form wire:submit="login" class="space-y-5">
      @if($error)
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded text-sm">
          {{ $error }}
        </div>
      @endif

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input
          wire:model="email"
          type="email"
          id="email"
          placeholder="admin@example.com"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          required
        />
        @error('email')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input
          wire:model="password"
          type="password"
          id="password"
          placeholder="••••••••"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          required
        />
        @error('password')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Checkbox + Forgot -->
      <div class="flex items-center justify-between mt-4">
        <label class="flex items-center text-sm text-gray-600">
          <input
            wire:model="remember"
            type="checkbox"
            class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
          />
          Remember me
        </label>
        <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
      </div>

      <!-- Login Button -->
      <button
        type="submit"
        class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition mt-4"
      >
        Log In
      </button>
    </form>

    <!-- Signup -->
    <div class="mt-6 text-center text-sm text-gray-600">
      Don’t have an account?
      <a href="{{ url('/register') }}" class="text-indigo-600 hover:underline font-medium">Sign up</a>
    </div>
  </div>
</div>
