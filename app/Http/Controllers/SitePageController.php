<?php

namespace App\Http\Controllers;

use App\Support\BlogPosts;
use App\Support\SiteContent;
use App\Support\SitePages;

class SitePageController extends Controller
{
    public function show(string $slug)
    {
        $content = SiteContent::get($slug);

        abort_unless($content, 404);

        return view('pages.content', [
            'slug' => $slug,
            'content' => $content,
        ]);
    }

    public function sitemap()
    {
        return view('pages.sitemap', [
            'content' => SiteContent::get('sitemap'),
            'groups' => SitePages::sitemapGroups(),
            'posts' => SiteContent::blogPosts(),
        ]);
    }

    public function sitemapXml()
    {
        $routeNames = array_values(array_unique(array_merge(
            ['home'],
            array_values(SitePages::routeNames()),
            ['tuition', 'tuition.centre', 'form', 'contact.us', 'blog', 'sitemap']
        )));

        $urls = [];

        foreach ($routeNames as $routeName) {
            $urls[] = [
                'loc' => route($routeName),
                'lastmod' => now()->toDateString(),
            ];
        }

        foreach (BlogPosts::all() as $post) {
            $urls[] = [
                'loc' => route('blog.post', $post['slug']),
                'lastmod' => $post['date'],
            ];
        }

        return response()
            ->view('pages.sitemap-xml', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
