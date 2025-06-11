<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-8">
            <div class="flex items-start p-5 rounded-lg border-l-4 border-green-500 bg-white dark:bg-gray-800 shadow-md">
                <div class="text-green-500">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-base font-semibold text-gray-800 dark:text-gray-100">Success!</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ session('message') }}</p>
                </div>
                <button onclick="this.closest('div.mb-8').remove()" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 p-1.5">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Filters + Create --}}
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
        <div class="flex flex-col md:flex-row justify-between gap-6 mb-6">
            <div class="flex flex-col md:flex-row gap-6">
                {{-- Search Title --}}
                <div class="w-full md:w-72">
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search Title</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="..." />
                            </svg>
                        </div>
                        <input type="text" wire:model.live="search" id="search"
                            class="block w-full rounded-xl border border-gray-300 bg-white dark:bg-gray-700 py-2.5 px-4 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="Search workouts...">
                    </div>
                </div>

                {{-- Filter by Trainer --}}
                <div class="w-full md:w-72">
                    <label for="trainer" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Filter by Trainer</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="..." />
                            </svg>
                        </div>
                        <input type="text" wire:model.live="trainer" id="trainer"
                            class="block w-full rounded-xl border border-gray-300 bg-white dark:bg-gray-700 py-2.5 px-4 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="Filter by trainer name...">
                    </div>
                </div>
            </div>

            {{-- Create Workout --}}
            <div class="flex items-end">
                <a href="{{ route('workouts.create') }}" class="inline-flex items-center px-4 py-2.5 bg-indigo-600 text-white text-xs font-semibold uppercase rounded-lg hover:bg-indigo-700 transition">
                    Create Workout
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="w-1/3 px-6 py-3 text-left font-medium uppercase cursor-pointer" wire:click="sortBy('title')">
                            Title
                            @if ($sortField === 'title')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                            @endif
                        </th>
                        <th class="w-1/6 px-6 py-3 text-left font-medium uppercase cursor-pointer" wire:click="sortBy('trainer')">
                            Trainer
                            @if ($sortField === 'trainer')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                            @endif
                        </th>
                        <th class="w-1/6 px-6 py-3 text-left font-medium uppercase cursor-pointer" wire:click="sortBy('is_active')">
                            Status
                            @if ($sortField === 'is_active')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                            @endif
                        </th>
                        <th class="w-1/6 px-6 py-3 text-left font-medium uppercase cursor-pointer" wire:click="sortBy('date')">
                            Date & Time
                            @if ($sortField === 'date')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                            @endif
                        </th>
                        <th class="w-1/6 px-6 py-3 text-left font-medium uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($workouts as $workout)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="space-y-1 max-w-xs">
                                    <div class="font-medium text-gray-900 dark:text-white truncate">{{ $workout->title }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">
                                        {{ $workout->description }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-300">{{ $workout->trainer }}</td>
                            <td class="px-6 py-4">
                                @if($workout->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                                <div class="flex flex-col">
                                    <span class="font-medium">{{ $workout->date->format('M j, Y') }}</span>
                                    <span class="text-sm">{{ $workout->date->format('g:i A') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-3 items-center">
                                <!-- Edit Icon (Pencil Square) -->
                                <a href="{{ route('workouts.edit', $workout) }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h6a1 1 0 100-2H4a4 4 0 00-4 4v10a4 4 0 004 4h10a4 4 0 004-4v-6a1 1 0 10-2 0v6a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" clip-rule="evenodd"/>
                                    </svg>
                                </a>

                                <!-- Delete Icon (Trash) -->
                                <button wire:click="confirmDelete({{ $workout->id }})" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 00-1-1h-1.5a1 1 0 01-.707-.293L13 4.5a1 1 0 00-.707-.293h-2.586a1 1 0 00-.707.293L9.207 5.707A1 1 0 018.5 6H7a1 1 0 00-1 1" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No workouts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $workouts->links() }}
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-xl p-6 w-full max-w-md border border-gray-200 dark:border-gray-700">
                <div class="flex flex-col items-center text-center">
                    <div class="mb-4 bg-red-100 dark:bg-red-900/20 p-3 rounded-full">
                        <svg class="h-8 w-8 text-red-500 dark:text-red-400" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75M12 15.75h.008v.008H12v-.008zM4.697 16.126c-.866 1.5.217 3.374 1.948 3.374h10.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L4.697 16.126z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Delete Workout</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Are you sure you want to delete this workout?</p>
                    <div class="mt-6 flex gap-4 justify-center">
                        <button wire:click="cancelDelete" class="px-4 py-2 w-32 text-sm rounded-lg border dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</button>
                        <button wire:click="deleteWorkout" class="px-4 py-2 w-32 text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 transition">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>