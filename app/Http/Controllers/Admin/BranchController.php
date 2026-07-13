<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::withTrashed()->orderBy('sort_order')->orderBy('created_at', 'desc')->get();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data               = $request->only(['label', 'address', 'phone', 'email', 'sort_order']);
            $data['is_active']  = $request->boolean('is_active');
            $data['sort_order'] = $data['sort_order'] ?? 0;

            Branch::create($data);

            return redirect()->route('branches')->with('success', 'Branch created successfully.');
        } catch (\Exception $e) {
            Log::error('Branch store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to save branch: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);

        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data               = $request->only(['label', 'address', 'phone', 'email', 'sort_order']);
            $data['is_active']  = $request->boolean('is_active');
            $data['sort_order'] = $data['sort_order'] ?? 0;

            $branch->update($data);

            return redirect()->route('branches')->with('success', 'Branch updated successfully.');
        } catch (\Exception $e) {
            Log::error('Branch update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to update branch: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the branch to trash.
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);

        try {
            $branch->delete();

            return redirect()->route('branches')->with('success', 'Branch moved to trash.');
        } catch (\Exception $e) {
            Log::error('Branch soft delete failed: ' . $e->getMessage());

            return redirect()->route('branches')->with('error', 'Failed to delete branch.');
        }
    }

    /**
     * Permanently delete — only meaningful for an already-trashed branch.
     */
    public function forceDestroy($id)
    {
        $branch = Branch::withTrashed()->findOrFail($id);

        try {
            $branch->forceDelete();

            return redirect()->route('branches')->with('success', 'Branch permanently deleted.');
        } catch (\Exception $e) {
            Log::error('Branch permanent delete failed: ' . $e->getMessage());

            return redirect()->route('branches')->with('error', 'Failed to permanently delete branch.');
        }
    }

    public function restore($id)
    {
        $branch = Branch::withTrashed()->findOrFail($id);
        $branch->restore();

        return redirect()->route('branches')->with('success', 'Branch restored.');
    }

    private function rules(): array
    {
        return [
            'label'      => 'required|string|max:255',
            'address'    => 'required|string|max:1000',
            'phone'      => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ];
    }
}
