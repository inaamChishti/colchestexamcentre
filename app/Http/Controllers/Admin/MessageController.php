<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->string('status')->toString();
        $source = $request->string('source')->toString();
        $search = $request->string('q')->toString();

        $messages = ContactMessage::query()
            ->when(in_array($status, ['new', 'read', 'archived'], true), fn ($query) => $query->where('status', $status))
            ->when(in_array($source, ['contact', 'tuition'], true), fn ($query) => $query->where('source', $source))
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('full_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('subject', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.messages.index', [
            'messages' => $messages,
            'status' => $status,
            'source' => $source,
            'search' => $search,
            'unreadCount' => ContactMessage::unread()->count(),
        ]);
    }

    public function show(ContactMessage $message)
    {
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function updateStatus(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,archived'],
        ]);

        $message->update($validated);

        return redirect()->back()->with('success', 'Message marked as '.$validated['status'].'.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
