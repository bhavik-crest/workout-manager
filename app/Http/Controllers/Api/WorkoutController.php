<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the workouts.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $workouts = $request->user()->workouts()
            ->when($request->filled('is_active'), function ($query) use ($request) {
                $query->where('is_active', $request->boolean('is_active'));
            })
            ->when($request->filled('sort'), function ($query) use ($request) {
                $direction = $request->input('direction', 'asc');
                $query->orderBy('date', $direction);
            }, function ($query) {
                $query->latest('date');
            })
            ->paginate(10);

        return WorkoutResource::collection($workouts);
    }

    /**
     * Store a newly created workout.
     */
    public function store(StoreWorkoutRequest $request)
    {
        $workout = $request->user()->workouts()->create($request->validated());

        return response()->json([
            'message' => 'Workout created successfully.',
            'data' => new WorkoutResource($workout),
        ], 201);
    }

    /**
     * Display the specified workout.
     */
    public function show(Request $request, Workout $workout)
    {
        if ($workout->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'You are not authorized to view this workout.',
            ], 403);
        }

        return response()->json([
            'data' => new WorkoutResource($workout),
        ]);
    }

    /**
     * Update the specified workout.
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        $workout->update($request->validated());

        return response()->json([
            'message' => 'Workout updated successfully.',
            'data' => new WorkoutResource($workout),
        ]);
    }

    /**
     * Remove the specified workout.
     */
    public function destroy(Request $request, Workout $workout)
    {
        if ($workout->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'You are not authorized to delete this workout.',
            ], 403);
        }

        $workout->delete();

        return response()->json([
            'message' => 'Workout deleted successfully.',
        ]);
    }
} 