<form wire:submit="save">
    <div class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
            <div class="mt-1">
                <input type="text" wire:model="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm @error('title') border-red-500 @enderror">
            </div>
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <div class="mt-1">
                <textarea wire:model="description" id="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm @error('description') border-red-500 @enderror"></textarea>
            </div>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="trainer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Trainer</label>
            <div class="mt-1">
                <input type="text" wire:model="trainer" id="trainer" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm @error('trainer') border-red-500 @enderror">
            </div>
            @error('trainer')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date and Time</label>
            <div class="mt-1">
                <input type="datetime-local" wire:model="date" id="date" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm @error('date') border-red-500 @enderror">
            </div>
            @error('date')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="slots" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Available Slots</label>
            <div class="mt-1">
                <input type="number" wire:model="slots" id="slots" min="1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm @error('slots') border-red-500 @enderror">
            </div>
            @error('slots')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <input type="checkbox" wire:model="is_active" id="is_active" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
            <label for="is_active" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Active</label>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('workouts') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ $isEdit ? 'Update' : 'Create' }} Workout
            </button>
        </div>
    </div>
</form> 