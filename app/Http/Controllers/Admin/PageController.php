<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Support\PageSchema;
use App\Support\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'groups' => PageSchema::groups(),
        ]);
    }

    public function edit(string $slug)
    {
        abort_unless(array_key_exists($slug, PageSchema::pages()), 404);

        return view('admin.pages.edit', [
            'slug' => $slug,
            'pageName' => PageSchema::pages()[$slug],
            'groups' => PageSchema::groups(),
            'content' => SiteContent::get($slug),
            'liveUrl' => PageSchema::previewUrl($slug),
        ]);
    }

    public function update(Request $request, string $slug)
    {
        abort_unless(array_key_exists($slug, PageSchema::pages()), 404);

        $request->validate([
            'page_fields' => ['nullable', 'array'],
            'page_fields.*' => ['nullable', 'string', 'max:10000'],
            'page_images' => ['nullable', 'array'],
            'page_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $allowedKeys = array_flip(PageSchema::editableKeys($slug));
        $validated = [];

        foreach ($request->input('page_fields', []) as $key => $value) {
            if (! is_string($key) || ! isset($allowedKeys[$key]) || ! is_string($value)) {
                continue;
            }

            $validated[$key] = $value;
        }

        $record = PageContent::firstOrNew(['page_slug' => $slug]);
        $existing = is_array($record->content) ? $record->content : [];
        $uploads = $request->file('page_images', []);
        $imageKeys = PageSchema::imageKeys($slug);

        if ($uploads !== []) {
            $directory = public_path('images/pages');
            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            foreach ($imageKeys as $key) {
                if (! isset($uploads[$key]) || ! $uploads[$key]->isValid()) {
                    continue;
                }

                $file = $uploads[$key];
                $extension = strtolower($file->extension() ?: $file->getClientOriginalExtension());
                if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                    continue;
                }

                $filename = Str::slug(str_replace('.', '-', $key)).'-'.now()->format('YmdHis').'-'.Str::lower(Str::random(6)).'.'.$extension;
                $file->move($directory, $filename);

                if (isset($existing[$key]) && str_starts_with($existing[$key], 'images/pages/') && is_file(public_path($existing[$key]))) {
                    @unlink(public_path($existing[$key]));
                }

                $validated[$key] = 'images/pages/'.$filename;
            }
        }

        $record->content = array_merge($existing, $validated);
        $record->save();

        return redirect()->back()->with('success', PageSchema::pages()[$slug].' updated successfully.');
    }
}
