<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Review;

class DashboardController extends Controller
{

    
    public function index()
    {
        // Set timezone ke WIB
        date_default_timezone_set('Asia/Jakarta');
        $now = now();

        $locations = Location::all()->map(function ($location) use ($now) {
            // Default status adalah Tutup
            $location->status = 'Tutup'; // Kita override status yang ada

            if (!empty($location->opening_hours) && strpos($location->opening_hours, '-') !== false) {
                list($open_time_str, $close_time_str) = explode('-', $location->opening_hours);

                try {
                    $open_time = \Carbon\Carbon::createFromFormat('H:i', trim($open_time_str));
                    $close_time = \Carbon\Carbon::createFromFormat('H:i', trim($close_time_str));

                    // Handle kasus semalam (misal: 22:00 - 02:00)
                    if ($close_time->lessThan($open_time)) {
                        if ($now->greaterThanOrEqualTo($open_time) || $now->lessThan($close_time)) {
                            $location->status = 'Buka';
                        }
                    } else {
                        // Kasus normal (misal: 08:00 - 17:00)
                        if ($now->between($open_time, $close_time, true)) {
                            $location->status = 'Buka';
                        }
                    }
                } catch (\Exception $e) {
                    // Jika parsing gagal, status tetap 'Tutup'
                }
            }
            
            return $location;
        });

        // Ambil review berdasarkan lokasi
        $reviews = Review::orderBy('created_at', 'desc')
            ->get()
            ->groupBy('location_id');

        return view('pages.dashboard', compact('locations', 'reviews'));
    }
    
}
