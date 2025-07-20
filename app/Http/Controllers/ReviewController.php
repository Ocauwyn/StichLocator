<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of reviews for admin panel
     */
    public function index()
    {
        if (request()->expectsJson()) {
            $reviews = Review::with(['user', 'location'])
                ->latest()
                ->get()
                ->map(function ($review) {
                    return [
                        'id' => $review->id,
                        'nama_penjahit' => $review->location ? $review->location->name : 'Lokasi Dihapus',
                        'rating' => $review->rating,
                        'review' => $review->review,
                        'created_at' => $review->created_at->format('d M Y H:i')
                    ];
                });
            
            return response()->json($reviews);
        }

        $locations = Location::all();
        return view('admin.rating_review', compact('locations'));
    }

    /**
     * Get reviews for a specific location
     */
    public function getReviews($locationId)
    {
        $reviews = Review::where('location_id', $locationId)
            ->with('user')
            ->latest()
            ->get()
            ->map(function ($review) {
                return [
                    'id' => $review->id,
                    'rating' => $review->rating,
                    'review' => $review->review,
                    'user_name' => $review->user ? $review->user->name : 'Anonymous',
                    'created_at' => $review->created_at->format('Y-m-d H:i:s')
                ];
            });

        return response()->json($reviews);
    }

    /**
     * Store a new review
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'location_id' => 'required|exists:locations,id',
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'required|string|max:500',
            ]);

            $review = Review::create([
                'location_id' => $validated['location_id'],
                'user_id' => Auth::id() ?? null,
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]);

            // Update location's average rating
            $this->updateLocationAverageRating($validated['location_id']);

            return response()->json([
                'success' => true,
                'message' => 'Review berhasil ditambahkan',
                'data' => $review
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error submitting review: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show a specific review
     */
    public function show($id)
    {
        try {
            $review = Review::with(['location', 'user'])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $review->id,
                    'nama_penjahit' => $review->location ? $review->location->name : 'Lokasi Dihapus',
                    'rating' => $review->rating,
                    'review' => $review->review,
                    'user_name' => $review->user ? $review->user->name : 'Anonymous',
                    'created_at' => $review->created_at->format('d M Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found'
            ], 404);
        }
    }

    /**
     * Update a review
     */
    public function update(Request $request, $id)
    {
        try {
            $review = Review::findOrFail($id);
            
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'required|string|max:500',
            ]);

            $review->update($validated);

            // Update location's average rating
            $this->updateLocationAverageRating($review->location_id);

            return response()->json([
                'success' => true,
                'message' => 'Review berhasil diperbarui',
                'data' => $review
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating review: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a review
     */
    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $locationId = $review->location_id;
            
            $review->delete();

            // Update location's average rating after deletion
            $this->updateLocationAverageRating($locationId);

            return response()->json([
                'success' => true,
                'message' => 'Review berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting review: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update location's average rating
     */
    private function updateLocationAverageRating($locationId)
    {
        $location = Location::find($locationId);
        if ($location) {
            $averageRating = Review::where('location_id', $locationId)->avg('rating') ?? 0;
            $location->update([
                'rating' => round($averageRating, 1)
            ]);
        }
    }
}
