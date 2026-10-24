<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        if ($request->filled('website')) {
            return redirect()->back()->with('success', 'Thank you for your message. We will be in touch shortly.');
        }

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['nullable', 'string', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:4000'],
            'source' => ['nullable', 'in:contact,tuition'],
        ]);

        ContactMessage::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'source' => $validated['source'] ?? 'contact',
            'status' => 'new',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Thank you — your message has been received. Our team will reply within one working day.');
    }
}
