<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Welcome to Your Workout Dashboard</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-indigo-100 dark:bg-indigo-900 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-indigo-200 mb-2">Total Workouts</h3>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ Auth::user()->workouts()->count() }}</p>
                    </div>

                    <div class="bg-green-100 dark:bg-green-900 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-green-800 dark:text-green-200 mb-2">Active Workouts</h3>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ Auth::user()->workouts()->where('is_active', true)->count() }}</p>
                    </div>

                    <div class="bg-purple-100 dark:bg-purple-900 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-purple-800 dark:text-purple-200 mb-2">Trainers</h3>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ Auth::user()->workouts()->distinct('trainer')->count('trainer') }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Quick Actions</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route('workouts.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Create New Workout
                        </a>
                        <a href="{{ route('workouts') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            View All Workouts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 