<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // Resolve logo to a public URL
        if (!empty($settings['logo'])) {
            $settings['logo_url'] = Storage::disk('public')->exists($settings['logo'])
                ? Storage::url($settings['logo'])
                : null;
        } else {
            $settings['logo_url'] = null;
        }

        return Inertia::render('Settings/Index', [
            'settings' => $settings,
        ])->with(['flash' => session('flash')]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings'                 => 'required|array',
            'settings.shop_name'       => 'nullable|string|max:255',
            'settings.shop_address'    => 'nullable|string',
            'settings.shop_phone'      => 'nullable|string|max:50',
            'settings.shop_email'      => 'nullable|email|max:255',
            'settings.currency'        => 'nullable|string|max:10',
            'settings.tax_rate'        => 'nullable|numeric|min:0|max:100',
            'settings.receipt_footer'  => 'nullable|string',
            'settings.ui_language'     => 'nullable|string|in:si,en,ta',
            'settings.bill_language'   => 'nullable|string|in:si,en,ta',
            'logo_file'                => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'remove_logo'              => 'nullable|boolean',
        ]);

        // Save text settings
        foreach ($validated['settings'] as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        // Remove logo if requested
        if ($request->boolean('remove_logo')) {
            $old = Setting::get('logo');
            if ($old) Storage::disk('public')->delete($old);
            Setting::set('logo', '');
        }

        // Handle logo file upload
        if ($request->hasFile('logo_file')) {
            // Delete old logo
            $old = Setting::get('logo');
            if ($old) Storage::disk('public')->delete($old);

            $path = $request->file('logo_file')->store('logos', 'public');
            Setting::set('logo', $path);
        }

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }
}
