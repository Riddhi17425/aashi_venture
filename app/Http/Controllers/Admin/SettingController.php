<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'nullable|string|max:50',

            'emails' => 'nullable|array',
            'emails.*' => 'nullable|email|max:255',

            'address' => 'nullable|string',
        ]);

        $phoneNumbers = collect($request->phone_numbers ?? [])
            ->filter(fn ($phone) => !empty(trim($phone)))
            ->map(fn ($phone) => trim($phone))
            ->implode(',');

        $emails = collect($request->emails ?? [])
            ->filter(fn ($email) => !empty(trim($email)))
            ->map(fn ($email) => trim($email))
            ->implode(',');

        $setting = Setting::first();

        if ($setting) {
            $setting->update([
                'phone_numbers' => $phoneNumbers,
                'emails' => $emails,
                'address' => $request->address,
            ]);
        } else {
            Setting::create([
                'phone_numbers' => $phoneNumbers,
                'emails' => $emails,
                'address' => $request->address,
            ]);
        }

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}