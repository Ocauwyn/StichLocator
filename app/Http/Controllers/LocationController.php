<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Method baru untuk API
    public function getLocations()
    {
        $locations = Location::all();
        return response()->json($locations);
    }
    

    // Method lama tetap ada
    public function index() {
        // Set timezone ke WIB
        date_default_timezone_set('Asia/Jakarta');
        $now = now();

        $locations = Location::all()->map(function ($location) use ($now) {
            // Default status adalah Tutup
            $location->dynamic_status = 'Tutup';

            if (!empty($location->opening_hours) && strpos($location->opening_hours, '-') !== false) {
                list($open_time_str, $close_time_str) = explode('-', $location->opening_hours);

                try {
                    $open_time = \Carbon\Carbon::createFromFormat('H:i', trim($open_time_str));
                    $close_time = \Carbon\Carbon::createFromFormat('H:i', trim($close_time_str));

                    // Handle kasus semalam (misal: 22:00 - 02:00)
                    if ($close_time->lessThan($open_time)) {
                        if ($now->greaterThanOrEqualTo($open_time) || $now->lessThan($close_time)) {
                            $location->dynamic_status = 'Buka';
                        }
                    } else {
                        // Kasus normal (misal: 08:00 - 17:00)
                        if ($now->between($open_time, $close_time, true)) {
                            $location->dynamic_status = 'Buka';
                        }
                    }
                } catch (\Exception $e) {
                    // Jika parsing gagal, status tetap 'Tutup'
                }
            }
            
            return $location;
        });

        return view('admin.datapenjahit', compact('locations'));
    }
    public function showRatingReview()
    {
        $locations = Location::all(); // Tambahkan ini
        return view('admin.rating_review', compact('locations')); // Teruskan data ke view
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image_url' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'opening_hours_start' => 'required|date_format:H:i',
            'opening_hours_end' => 'required|date_format:H:i',
        ]);

        $data = $request->all();
        $data['opening_hours'] = $request->opening_hours_start . ' - ' . $request->opening_hours_end;

        Location::create($data);

        return redirect()->route('datapenjahit');
    }

    public function edit($id) {
        $location = Location::findOrFail($id);
        return view('admin.datapenjahit', compact('location'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image_url' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'opening_hours_start' => 'required|date_format:H:i',
            'opening_hours_end' => 'required|date_format:H:i',
        ]);

        $location = Location::findOrFail($id);
        $data = $request->all();
        $data['opening_hours'] = $request->opening_hours_start . ' - ' . $request->opening_hours_end;

        $location->update($data);

        return redirect()->route('datapenjahit');
    }

    public function destroy($id) {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('penjahit.index');
    }
}
