@php
    $isEdit = $course->exists;
    $levels = ['GCSE', 'IGCSE', 'A-Level', 'GCE O-Level', 'University', 'Adult', 'Other'];
@endphp

<form method="POST" action="{{ $isEdit ? route('admin.courses.update', $course) : route('admin.courses.store') }}" enctype="multipart/form-data">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="form-panel">
        <div class="form-section">
            <p class="form-section-title">Course details</p>

            <div class="form-row">
                <div class="admin-field">
                    <label for="title">Course title <span>*</span></label>
                    <input id="title" type="text" name="title" value="{{ old('title', $course->title) }}" required maxlength="150" placeholder="e.g. GCSE Mathematics">
                    @error('title')<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="level">Level <span>*</span></label>
                    <select id="level" name="level" required>
                        <option value="">Choose a level</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level }}" {{ old('level', $course->level) === $level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                    @error('level')<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-field">
                <label for="description">Description <span>*</span></label>
                <textarea id="description" name="description" rows="4" required maxlength="2000" placeholder="What does this course cover and who is it for?">{{ old('description', $course->description) }}</textarea>
                <span class="hint">Keep it to roughly 2–3 sentences. This appears on the course card.</span>
                @error('description')<span class="field-error-admin">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-section">
            <p class="form-section-title">Delivery &amp; fees</p>

            <div class="form-row form-row--3">
                <div class="admin-field">
                    <label for="duration">Duration</label>
                    <input id="duration" type="text" name="duration" value="{{ old('duration', $course->duration) }}" maxlength="60" placeholder="e.g. 24 weeks">
                    @error('duration')<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="fee">Course fee</label>
                    <input id="fee" type="text" name="fee" value="{{ old('fee', $course->fee) }}" maxlength="60" placeholder="e.g. £720">
                    @error('fee')<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="sort_order">Display order</label>
                    <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $course->sort_order ?? 0) }}" min="0" max="999">
                    <span class="hint">Lower numbers appear first.</span>
                    @error('sort_order')<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-field">
                <label for="schedule">Schedule</label>
                <input id="schedule" type="text" name="schedule" value="{{ old('schedule', $course->schedule) }}" maxlength="120" placeholder="e.g. Tuesdays, 5:00 – 7:00pm">
                @error('schedule')<span class="field-error-admin">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-section">
            <p class="form-section-title">Image</p>

            <div class="admin-field">
                <label for="image">Course image</label>
                <input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp" data-image-input>
                <span class="hint">JPG, PNG or WebP · up to 4 MB · recommended 1200 × 800px.</span>
                @error('image')<span class="field-error-admin">{{ $message }}</span>@enderror

                @if ($course->image)
                    <div class="image-preview" data-image-preview>
                        <img src="{{ asset($course->image) }}" alt="Current course image">
                        <span>Current image. Upload a new file to replace it.</span>
                    </div>
                @else
                    <div class="image-preview" data-image-preview>
                        <span>No image uploaded yet. A default study image will be used.</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-section">
            <p class="form-section-title">Visibility</p>
            <label class="checkbox-row">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $course->is_active ?? true) ? 'checked' : '' }}>
                Publish this course on the website
            </label>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.courses.index') }}" class="btn-admin btn-admin--ghost">Cancel</a>
            <button type="submit" class="btn-admin btn-admin--primary">
                {{ $isEdit ? 'Save changes' : 'Create course' }}
            </button>
        </div>
    </div>
</form>
