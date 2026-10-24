<?php

namespace App\Http\Controllers;

use App\Models\TuitionCourse;
use App\Support\SiteContent;

class PageController extends Controller
{
    public function contact()
    {
        return view('contact', [
            'content' => SiteContent::get('contact'),
        ]);
    }

    public function tuition()
    {
        return view('tuition', [
            'content' => SiteContent::get('tuition'),
            'courses' => TuitionCourse::active()->orderBy('sort_order')->get(),
        ]);
    }

    public function tuitionPage()
    {
        return view('tuition-page', [
            'content' => SiteContent::get('tuition-page'),
        ]);
    }

    public function form()
    {
        return view('form', [
            'content' => SiteContent::get('form'),
        ]);
    }
}
