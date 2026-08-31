<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::withTrashed()
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(isCreate: true));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['leader_title', 'leader_description', 'leader_name', 'leader_designation']);

            if ($request->hasFile('leader_image')) {
                $data['leader_image'] = storeImageWithTimeId($request->file('leader_image'), 'leaders');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            Leader::create($data);

            return redirect()->route('leaders')->with('toast_success', 'Leader added successfully.');
        } catch (\Exception $e) {
            Log::error('Leader store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save leader: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $leader = Leader::findOrFail($id);

        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, $id)
    {
        $leader = Leader::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules(isCreate: false));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['leader_title', 'leader_description', 'leader_name', 'leader_designation']);

            if ($request->hasFile('leader_image')) {
                deleteStoredFile($leader->leader_image);
                $data['leader_image'] = storeImageWithTimeId($request->file('leader_image'), 'leaders');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            $leader->update($data);

            return redirect()->route('leaders')->with('toast_success', 'Leader updated successfully.');
        } catch (\Exception $e) {
            Log::error('Leader update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update leader: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $leader = Leader::findOrFail($id);

        try {
            $leader->delete();

            return redirect()->route('leaders')->with('toast_success', 'Leader moved to trash.');
        } catch (\Exception $e) {
            Log::error('Leader soft delete failed: ' . $e->getMessage());

            return redirect()->route('leaders')->with('toast_error', 'Failed to delete leader.');
        }
    }

    public function restore($id)
    {
        $leader = Leader::withTrashed()->findOrFail($id);
        $leader->restore();

        return redirect()->route('leaders')->with('toast_success', 'Leader restored.');
    }

    public function toggleStatus($id)
    {
        $leader            = Leader::findOrFail($id);
        $leader->is_active = ! $leader->is_active;
        $leader->save();

        return response()->json([
            'success'   => true,
            'is_active' => $leader->is_active,
        ]);
    }

    private function rules(bool $isCreate): array
    {
        return [
            'leader_title'       => 'required|string|max:255',
            'leader_image'       => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'leader_description' => 'nullable|string',
            'leader_name'        => 'required|string|max:255',
            'leader_designation' => 'required|string|max:255',
            'sort_order'         => 'nullable|integer|min:0',
            'is_active'          => 'nullable|boolean',
        ];
    }
}