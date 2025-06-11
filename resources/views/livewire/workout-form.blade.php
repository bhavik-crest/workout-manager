<div class="workout-form-component">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 lg:p-8 max-w-4xl mx-auto">
            @if (session()->has('message'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="border-b border-gray-200 dark:border-gray-700 pb-5">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $isEdit ? 'Edit' : 'Create' }} Workout</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Fill in the details below to {{ $isEdit ? 'update' : 'create' }} a workout session.</p>
            </div>
            
            <form wire:submit.prevent="save" class="mt-8 space-y-8">
                <div class="space-y-8">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100 mb-2">Title</label>
                        <div class="mt-1">
                            <input type="text" wire:model.live="title" id="title" 
                                class="block w-full rounded-lg border-0 px-4 py-3 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-500 dark:placeholder:text-gray-400 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-gray-700 sm:text-sm sm:leading-6 @error('title') ring-red-500 @enderror"
                                placeholder="e.g., Morning Yoga Session">
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100 mb-2">Description</label>
                        <div class="mt-1">
                            <textarea wire:model.live="description" id="description" rows="4" 
                                class="block w-full rounded-lg border-0 px-4 py-3 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-500 dark:placeholder:text-gray-400 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-gray-700 sm:text-sm sm:leading-6 @error('description') ring-red-500 @enderror"
                                placeholder="e.g., A 60-minute yoga session focusing on flexibility and mindfulness..."></textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                        <!-- Trainer -->
                        <div>
                            <label for="trainer" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100 mb-2">Trainer</label>
                            <div class="mt-1">
                                <input type="text" wire:model.live="trainer" id="trainer" 
                                    class="block w-full rounded-lg border-0 px-4 py-3 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-500 dark:placeholder:text-gray-400 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-gray-700 sm:text-sm sm:leading-6 @error('trainer') ring-red-500 @enderror"
                                    placeholder="e.g., John Smith">
                            </div>
                            @error('trainer')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date and Time -->
                        <div>
                            <label for="date" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100 mb-2">Date and Time</label>
                            <div class="mt-1">
                                <input type="datetime-local" wire:model.live="date" id="date" 
                                    class="block w-full rounded-lg border-0 px-4 py-3 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-500 dark:placeholder:text-gray-400 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-gray-700 sm:text-sm sm:leading-6 @error('date') ring-red-500 @enderror">
                            </div>
                            @error('date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Available Slots -->
                        <div>
                            <label for="slots" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100 mb-2">Available Slots</label>
                            <div class="mt-1">
                                <input type="number" wire:model.live="slots" id="slots" min="1" 
                                    class="block w-full rounded-lg border-0 px-4 py-3 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-500 dark:placeholder:text-gray-400 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-gray-700 sm:text-sm sm:leading-6 @error('slots') ring-red-500 @enderror"
                                    placeholder="e.g., 10">
                            </div>
                            @error('slots')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Active Status -->
                        <div class="flex items-center h-full">
                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input type="checkbox" wire:model.live="is_active" id="is_active" 
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 dark:border-gray-600 dark:bg-gray-700">
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="is_active" class="font-medium text-gray-900 dark:text-gray-100">Active Workout</label>
                                    <p class="text-gray-500 dark:text-gray-400">Make this workout available for booking</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-x-6 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('workouts') }}" 
                        class="rounded-md bg-white dark:bg-gray-700 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ $isEdit ? 'Update' : 'Create' }} Workout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 