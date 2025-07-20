<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admin.dashboard'); // Pastikan file dashboard.blade.php ada di folder admin
    }
}
