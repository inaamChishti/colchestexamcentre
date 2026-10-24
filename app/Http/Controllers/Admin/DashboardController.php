<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\TuitionCourse;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalMessages' => ContactMessage::count(),
            'unreadMessages' => ContactMessage::unread()->count(),
            'totalCourses' => TuitionCourse::count(),
            'activeCourses' => TuitionCourse::active()->count(),
            'recentMessages' => ContactMessage::latest()->take(6)->get(),
            'recentCourses' => TuitionCourse::orderByDesc('updated_at')->take(5)->get(),
        ]);
    }
}
