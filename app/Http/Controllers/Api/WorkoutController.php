<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;
use Exception;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the workouts.
     */
    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        try {
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

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch workouts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created workout.
     */
    public function store(StoreWorkoutRequest $request)
    {
        try {
            $workout = $request->user()->workouts()->create($request->validated());

            return response()->json([
                'message' => 'Workout created successfully',
                'data' => new WorkoutResource($workout)
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create workout',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified workout.
     */
    public function show(Request $request, Workout $workout)
    {
        try {
            if ($workout->user_id !== $request->user()->id) {
                return response()->json([
                    'message' => 'You are not authorized to view this workout'
                ], 403);
            }

            return response()->json([
                'data' => new WorkoutResource($workout)
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch workout',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified workout.
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        try {
            $workout->update($request->validated());

            return response()->json([
                'message' => 'Workout updated successfully',
                'data' => new WorkoutResource($workout)
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to update workout',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified workout.
     */
    public function destroy(Request $request, Workout $workout)
    {
        try {
            if ($workout->user_id !== $request->user()->id) {
                return response()->json([
                    'message' => 'You are not authorized to delete this workout'
                ], 403);
            }

            $workout->delete();

            return response()->json([
                'message' => 'Workout deleted successfully'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to delete workout',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 