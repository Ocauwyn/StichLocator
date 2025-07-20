<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            // Get basic statistics with default values
            $totalPenjahit = Location::count() ?? 0;
            $totalReviews = Review::count() ?? 0;
            $averageRating = number_format(Review::avg('rating') ?? 0, 1);
            $totalUsers = User::count() ?? 0;

            // Get rating distribution
            $ratingDistribution = Review::select('rating', DB::raw('count(*) as count'))
                ->groupBy('rating')
                ->orderBy('rating')
                ->pluck('count', 'rating')
                ->toArray();

            // Fill in missing ratings with 0
            $ratingDistribution = array_replace(
                array_fill(1, 5, 0),
                $ratingDistribution
            );

            // Get reviews timeline (last 7 days)
            $reviewsTimeline = Review::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as count')
            )
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            // Fill in missing dates with 0
            $dates = collect();
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->format('Y-m-d');
                $count = $reviewsTimeline->firstWhere('date', $date)?->count ?? 0;
                $dates->push([
                    'date' => Carbon::parse($date)->format('M d'),
                    'count' => $count
                ]);
            }
            $reviewsTimeline = $dates;

            // Get recent reviews
            $recentReviews = Review::with(['location'])
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            // Return view with all required variables
            return view('admin.dashboard', compact(
                'totalPenjahit',
                'totalReviews',
                'averageRating',
                'totalUsers',
                'ratingDistribution',
                'reviewsTimeline',
                'recentReviews'
            ));

        } catch (\Exception $e) {
            // Log the error and return view with default values
            \Log::error('Dashboard Error: ' . $e->getMessage());
            
            return view('admin.dashboard', [
                'totalPenjahit' => 0,
                'totalReviews' => 0,
                'averageRating' => 0,
                'totalUsers' => 0,
                'ratingDistribution' => array_fill(1, 5, 0),
                'reviewsTimeline' => collect(),
                'recentReviews' => collect()
            ])->with('error', 'Error loading dashboard data');
        }
    }
}