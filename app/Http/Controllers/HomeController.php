<?php

namespace App\Http\Controllers;

use App\Models\TuitionCourse;
use App\Support\SiteContent;

class HomeController extends Controller
{
    public function index()
    {
        $content = SiteContent::get('home');
        $courses = TuitionCourse::active()->orderBy('sort_order')->take(3)->get();

        // dd($content, $courses);

        return view('home', [
            'content' => $content,
            'courses' => $courses,
        ]);
    }
}
