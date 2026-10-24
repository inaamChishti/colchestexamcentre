<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TuitionCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('q')->toString();

        $courses = TuitionCourse::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('level', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        return view('admin.courses.index', [
            'courses' => $courses,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', [
            'course' => new TuitionCourse(['is_active' => true, 'sort_order' => 0]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['image'] = $this->storeImage($request);

        TuitionCourse::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(TuitionCourse $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, TuitionCourse $course)
    {
        $data = $this->validated($request, $course);
        $data['slug'] = $this->uniqueSlug($data['title'], $course->id);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['image'] = $this->storeImage($request, $course->image);

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(TuitionCourse $course)
    {
        if ($course->image && Str::startsWith($course->image, 'images/courses/')) {
            $path = public_path($course->image);
            if (is_file($path)) {
                @unlink($path);
            }
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }

    private function validated(Request $request, ?TuitionCourse $course = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'level' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string', 'max:2000'],
            'duration' => ['nullable', 'string', 'max:60'],
            'fee' => ['nullable', 'string', 'max:60'],
            'schedule' => ['nullable', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255'],
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'course';
        $slug = $base;
        $counter = 2;

        while (TuitionCourse::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base.'-'.$counter++;
        }

        return $slug;
    }

    private function storeImage(Request $request, ?string $existing = null): ?string
    {
        if ($request->hasFile('image')) {
            $directory = public_path('images/courses');
            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $file = $request->file('image');
            $name = time().'-'.Str::random(6).'.'.$file->getClientOriginalExtension();
            $file->move($directory, $name);

            return 'images/courses/'.$name;
        }

        if ($request->filled('image_path')) {
            return $request->string('image_path')->toString();
        }

        return $existing;
    }
}
