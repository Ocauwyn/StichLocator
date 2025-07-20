<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;

// Admin Authentication Routes
Route::group(['prefix' => 'admin'], function () {
    // Redirect /admin to admin login if not authenticated
    Route::get('/', function () {
        return Auth::guard('admin')->check() 
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // Guest routes (login, register)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
        Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    });

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        
        // Add your other admin protected routes here
        Route::get('/datapenjahit', [LocationController::class, 'index'])->name('datapenjahit');
        Route::get('/rating_review', [ReviewController::class, 'index'])->name('rating_review');

        // API endpoints for reviews
        Route::get('/api/reviews', [ReviewController::class, 'index']);
        Route::post('/api/reviews', [ReviewController::class, 'store']);
        Route::get('/api/reviews/{id}', [ReviewController::class, 'show']);
        Route::put('/api/reviews/{id}', [ReviewController::class, 'update']);
        Route::delete('/api/reviews/{id}', [ReviewController::class, 'destroy']);
        Route::get('/api/locations', [LocationController::class, 'getLocations']); // Route for locations API
    });
});

// User routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/submit-review', [ReviewController::class, 'store'])->name('submit-review');
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('user.profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('user.profile.update');
});

Route::get('/locations', [ReviewController::class, 'getLocations'])->name('locations.get');

// User Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Review Routes
Route::get('/reviews', function () {
    return response()->json(Review::with('user')->get());
});

Route::post('/reviews', function (Request $request) {
    $validated = $request->validate([
        'location_id' => 'required|exists:locations,id',
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|string'
    ]);

    $review = new Review();
    $review->user_id = Auth::id();
    $review->location_id = $validated['location_id'];
    $review->rating = $validated['rating'];
    $review->review = $validated['review'];
    $review->save();

    return response()->json(['message' => 'Review berhasil disimpan!'], 200);
});

Route::put('/reviews/{id}', function (Request $request, $id) {
    $review = Review::find($id);
    if ($review) {
        $review->update([
            'rating' => $request->rating,
            'review' => $request->review
        ]);
        return response()->json($review);
    }
    return response()->json(['message' => 'Review tidak ditemukan'], 404);
});

Route::delete('/reviews/{id}', function ($id) {
    $review = Review::find($id);
    if ($review) {
        $review->delete();
        return response()->json(['message' => 'Review berhasil dihapus']);
    }
    return response()->json(['message' => 'Review tidak ditemukan'], 404);
});

Route::get('/reviews/{id}', function ($id) {
    return Review::where('location_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
});

Route::get('/locations', [LocationController::class, 'getLocations']);
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// Rating & Review Routes
Route::get('/rating_review', [ReviewController::class, 'index'])->name('rating_review');
Route::get('/api/locations', [ReviewController::class, 'getLocations']);
Route::get('/api/reviews', [ReviewController::class, 'index']);
Route::post('/api/reviews', [ReviewController::class, 'store']);
Route::get('/api/reviews/{id}', [ReviewController::class, 'show']);
Route::put('/api/reviews/{id}', [ReviewController::class, 'update']);
Route::delete('/api/reviews/{id}', [ReviewController::class, 'destroy']);
Route::get('/reviews/{id}', [ReviewController::class, 'getReviews']);

// Penjahit Routes
Route::prefix('penjahit')->name('penjahit.')->middleware(['auth'])->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('index');
    Route::get('/create', [LocationController::class, 'create'])->name('create');
    Route::post('/', [LocationController::class, 'store'])->name('store');
    Route::get('{id}/edit', [LocationController::class, 'edit'])->name('edit');
    Route::put('{id}', [LocationController::class, 'update'])->name('update');
    Route::delete('{id}', [LocationController::class, 'destroy'])->name('destroy');
    Route::get('/location/{id}', [LocationController::class, 'show'])->name('location.show');
});

Route::get('/datapenjahit', [LocationController::class, 'index'])->name('datapenjahit');