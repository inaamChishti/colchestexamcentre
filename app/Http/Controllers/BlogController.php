<?php

namespace App\Http\Controllers;

use App\Support\SiteContent;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'content' => SiteContent::get('blog'),
            'posts' => SiteContent::blogPosts(),
        ]);
    }

    public function show(string $post)
    {
        $entry = SiteContent::blogPost($post);

        abort_unless($entry, 404);

        $related = collect(SiteContent::blogPosts())
            ->except($post)
            ->take(2)
            ->all();

        return view('blog.show', [
            'content' => $entry,
            'post' => $entry,
            'related' => $related,
        ]);
    }
}
