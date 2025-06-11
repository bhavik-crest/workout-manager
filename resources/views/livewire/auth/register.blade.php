<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-xl bg-white dark:bg-gray-800 shadow-lg rounded-2xl">
        <!-- Internal Padding Managed -->
        <div class="px-8 py-10 sm:px-12 sm:py-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-4 mt-4">
                Create an Account 🚀
            </h2>

            <form wire:submit="register" class="space-y-6">
                @if($error)
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ $error }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <div class="relative">
                        <input wire:model="name" type="text" id="name"
                            class="w-full px-4 py-3 border {{ $errors->has('name') && $showErrors ? 'border-red-300' : 'border-gray-300 dark:border-gray-600' }} rounded-md bg-white dark:bg-gray-700 dark:text-white"
                            required>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <div class="relative">
                        <input wire:model="email" type="email" id="email"
                            class="w-full px-4 py-3 border {{ $errors->has('email') && $showErrors ? 'border-red-300' : 'border-gray-300 dark:border-gray-600' }} rounded-md bg-white dark:bg-gray-700 dark:text-white"
                            required>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <div class="relative">
                        <input wire:model="password" type="password" id="password"
                            class="w-full px-4 py-3 border {{ $errors->has('password') && $showErrors ? 'border-red-300' : 'border-gray-300 dark:border-gray-600' }} rounded-md bg-white dark:bg-gray-700 dark:text-white"
                            required>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
                    <div class="relative">
                        <input wire:model="password_confirmation" type="password" id="password_confirmation"
                            class="w-full px-4 py-3 border {{ $errors->has('password_confirmation') && $showErrors ? 'border-red-300' : 'border-gray-300 dark:border-gray-600' }} rounded-md bg-white dark:bg-gray-700 dark:text-white"
                            required>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition duration-150 ease-in-out">
                        Register
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center mb-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
