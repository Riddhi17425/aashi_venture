<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::withTrashed()->orderBy('created_at', 'desc')->get();

        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'key' => $request->filled('key') ? Str::slug($request->key, '_') : Str::slug($request->label, '_'),
        ]);

        $validator = Validator::make($request->all(), $this->rules($request));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data              = $request->only(['key', 'label', 'type', 'image_alt']);
            $data['is_active'] = $request->boolean('is_active');

            if ($request->type === 'image') {
                if ($request->hasFile('image')) {
                    $data['image'] = storeImageWithTimeId($request->file('image'), 'settings');
                }
                $data['value'] = null;
            } else {
                $data['value']     = $request->input('value');
                $data['image']     = null;
                $data['image_alt'] = null;
            }

            Setting::create($data);

            return redirect()->route('settings')->with('toast_success', 'Setting created successfully.');
        } catch (\Exception $e) {
            Log::error('Setting store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save setting: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->merge([
            'key' => $request->filled('key') ? Str::slug($request->key, '_') : Str::slug($request->label, '_'),
        ]);

        $validator = Validator::make($request->all(), $this->rules($request, $setting->id));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data              = $request->only(['key', 'label', 'type', 'image_alt']);
            $data['is_active'] = $request->boolean('is_active');

            if ($request->type === 'image') {
                if ($request->hasFile('image')) {
                    deleteStoredFile($setting->image);
                    $data['image'] = storeImageWithTimeId($request->file('image'), 'settings');
                } else {
                    $data['image'] = $setting->image; // keep existing image if none re-uploaded
                }
                $data['value'] = null;
            } else {
                deleteStoredFile($setting->image);
                $data['value']     = $request->input('value');
                $data['image']     = null;
                $data['image_alt'] = null;
            }

            $setting->update($data);

            return redirect()->route('settings')->with('toast_success', 'Setting updated successfully.');
        } catch (\Exception $e) {
            Log::error('Setting update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update setting: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);

        try {
            $setting->delete();

            return redirect()->route('settings')->with('toast_success', 'Setting moved to trash.');
        } catch (\Exception $e) {
            Log::error('Setting soft delete failed: ' . $e->getMessage());

            return redirect()->route('settings')->with('toast_error', 'Failed to delete setting.');
        }
    }

    public function restore($id)
    {
        $setting = Setting::withTrashed()->findOrFail($id);
        $setting->restore();

        return redirect()->route('settings')->with('toast_success', 'Setting restored.');
    }

    public function toggleStatus($id)
    {
        $setting            = Setting::findOrFail($id);
        $setting->is_active = ! $setting->is_active;
        $setting->save();

        return response()->json([
            'success'   => true,
            'is_active' => $setting->is_active,
        ]);
    }

    private function rules(Request $request, ?int $ignoreId = null): array
    {
        $isCreate = is_null($ignoreId);
        $type     = $request->input('type');

        $keyRule = 'required|string|max:255|regex:/^[a-z0-9_]+$/|unique:settings,key';
        if (! $isCreate) {
            $keyRule .= ',' . $ignoreId;
        }

        $valueRule = ['nullable', 'string', 'max:1000'];
        if (in_array($type, ['text', 'url'])) {
            array_unshift($valueRule, 'required');
        }
        if ($type === 'url') {
            $valueRule[] = 'url';
        }

        $imageRequired = $isCreate && $type === 'image';

        return [
            'key'       => $keyRule,
            'label'     => 'required|string|max:255',
            'type'      => 'required|in:text,url,image',
            'value'     => $valueRule,
            'image'     => ($imageRequired ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ];
    }
}
