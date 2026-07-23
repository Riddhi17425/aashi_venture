<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrustedPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TrustedPartnerController extends Controller
{
    public function index()
    {
        $partners = TrustedPartner::withTrashed()
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(isCreate: true));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['logo_alt']);

            if ($request->hasFile('logo')) {
                $data['logo'] = storeImageWithTimeId($request->file('logo'), 'partners/logos');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            TrustedPartner::create($data);

            return redirect()->route('partners')->with('toast_success', 'Partner logo added successfully.');
        } catch (\Exception $e) {
            Log::error('Trusted partner store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save partner logo: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $partner = TrustedPartner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = TrustedPartner::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules(isCreate: false));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['logo_alt']);

            if ($request->hasFile('logo')) {
                deleteStoredFile($partner->logo);
                $data['logo'] = storeImageWithTimeId($request->file('logo'), 'partners/logos');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            $partner->update($data);

            return redirect()->route('partners')->with('toast_success', 'Partner logo updated successfully.');
        } catch (\Exception $e) {
            Log::error('Trusted partner update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update partner logo: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the partner logo to trash. File is kept on disk
     * so a later Restore still has its image intact.
     */
    public function destroy($id)
    {
        $partner = TrustedPartner::findOrFail($id);

        try {
            $partner->delete();

            return redirect()->route('partners')->with('toast_success', 'Partner logo moved to trash.');
        } catch (\Exception $e) {
            Log::error('Trusted partner soft delete failed: ' . $e->getMessage());

            return redirect()->route('partners')->with('toast_error', 'Failed to delete partner logo.');
        }
    }

    public function restore($id)
    {
        $partner = TrustedPartner::withTrashed()->findOrFail($id);
        $partner->restore();

        return redirect()->route('partners')->with('toast_success', 'Partner logo restored.');
    }

    public function toggleStatus($id)
    {
        $partner            = TrustedPartner::findOrFail($id);
        $partner->is_active = ! $partner->is_active;
        $partner->save();

        return response()->json([
            'success'   => true,
            'is_active' => $partner->is_active,
        ]);
    }

    private function rules(bool $isCreate): array
    {
        return [
            'logo'       => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_alt'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ];
    }
}
