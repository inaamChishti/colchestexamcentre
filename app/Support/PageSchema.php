<?php

namespace App\Support;

class PageSchema
{
    public static function groups(): array
    {
        return [
            'Core pages' => [
                'home' => 'Home page',
                'tuition' => 'Tuition Centre page',
                'tuition-page' => 'Tuition page (new)',
                'contact' => 'Contact Us page',
                'form' => 'Online Form page',
            ],
            'Exam pages' => [
                'exams' => 'Exams',
                'gcse-exams' => 'GCSE Exams',
                'igcse-exams' => 'IGCSE Exams',
                'alevel-exams' => 'A-Level Exams',
                'gce-o-level-exams' => 'GCE O-Level Exams',
                'international-universities-exams' => 'International University Exams',
                'exam-registration' => 'Exam Registration',
            ],
            'Information' => [
                'about-us' => 'About Us',
                'private-candidates' => 'Private Candidates',
                'exam-fees' => 'Exam Fees',
                'exam-dates' => 'Exam Dates',
                'subjects-offered' => 'Subjects Offered',
                'exam-boards' => 'Exam Boards',
                'booking-process' => 'Booking Process',
                'testimonials' => 'Testimonials',
            ],
            'Services' => [
                'practical-endorsement' => 'Practical Endorsement',
                'online-learning' => 'Online Learning',
            ],
            'Blog' => [
                'blog' => 'Blog index',
                'blog-choosing-an-exam-board' => 'Blog: Choosing an exam board',
                'blog-gcse-resits-guide' => 'Blog: GCSE resits guide',
                'blog-a-level-practical-endorsement' => 'Blog: A-Level practical endorsement',
                'blog-first-private-exam-day' => 'Blog: First private exam day',
            ],
            'Policies & sitemap' => [
                'privacy-policy' => 'Privacy Policy',
                'terms-of-use' => 'Terms of Use',
                'cookie-policy' => 'Cookie Policy',
                'sitemap' => 'Sitemap',
            ],
        ];
    }

    public static function pages(): array
    {
        $pages = [];

        foreach (self::groups() as $group) {
            $pages = array_merge($pages, $group);
        }

        return $pages;
    }

    public static function previewUrl(string $slug): string
    {
        $siteRoutes = SitePages::routeNames();

        if (isset($siteRoutes[$slug])) {
            return route($siteRoutes[$slug]);
        }

        if (str_starts_with($slug, 'blog-')) {
            return route('blog.post', substr($slug, 5));
        }

        return match ($slug) {
            'home' => route('home'),
            'tuition' => route('tuition.centre'),
            'tuition-page' => route('tuition'),
            'contact' => route('contact.us'),
            'form' => route('form'),
            'blog' => route('blog'),
            'sitemap' => route('sitemap'),
            default => route('home'),
        };
    }

    public static function sections(string $slug): array
    {
        return [];
    }

    public static function editableKeys(string $slug): array
    {
        $keys = array_keys(self::flatten(SiteContent::defaults($slug)));

        return array_values(array_filter($keys, function ($key) {
            $last = str_contains($key, '.') ? substr($key, strrpos($key, '.') + 1) : $key;

            return ! in_array($last, ['slug', 'route'], true);
        }));
    }

    public static function imageKeys(string $slug): array
    {
        $flat = self::flatten(SiteContent::defaults($slug));
        $keys = [];

        foreach ($flat as $key => $value) {
            if (! is_string($value)) {
                continue;
            }

            $last = str_contains($key, '.') ? substr($key, strrpos($key, '.') + 1) : $key;

            if (str_ends_with($last, 'image') || str_starts_with($value, 'images/')) {
                $keys[] = $key;
            }
        }

        return $keys;
    }

    private static function flatten(array $data, string $prefix = ''): array
    {
        $flat = [];

        foreach ($data as $key => $value) {
            $path = $prefix === '' ? (string) $key : $prefix.'.'.$key;

            if (is_array($value)) {
                $flat = array_merge($flat, self::flatten($value, $path));
            } else {
                $flat[$path] = $value;
            }
        }

        return $flat;
    }
}
