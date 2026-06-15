<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return back()->with('success', 'Thank you, ' . $validated['name'] . '! We received your message and will respond within 24 hours.');
    }
}
