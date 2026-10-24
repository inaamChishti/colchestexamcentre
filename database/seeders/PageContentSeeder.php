<?php

namespace Database\Seeders;

use App\Models\PageContent;
use App\Support\SiteContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['home', 'tuition', 'contact'] as $slug) {
            PageContent::updateOrCreate(
                ['page_slug' => $slug],
                ['content' => SiteContent::defaults($slug)]
            );
        }
    }
}
