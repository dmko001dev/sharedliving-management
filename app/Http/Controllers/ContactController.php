<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'type' => 'required|string|in:resident,referral,other',
            'message' => 'nullable|string|max:2000',
        ]);

        try {
            Mail::to(config('contact.recipient'))
                ->send(new ContactFormSubmitted($validated));
        } catch (\Throwable $e) {
            Log::error('Contact form email failed', [
                'error' => $e->getMessage(),
                'email' => $validated['email'],
            ]);

            return back()
                ->withInput()
                ->with('error', 'We could not send your message right now. Please call us at (513) 571-0154.');
        }

        return back()->with('success', 'Thank you, '.$validated['name'].'! We received your message and will respond within 24 hours.');
    }
}
