<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OurStoryController extends Controller
{
    public function index()
    {
        $ourStories = OurStory::withTrashed()
            ->orderBy('year', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.our_stories.index', compact('ourStories'));
    }

    public function create()
    {
        return view('admin.our_stories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'year',
                'shortnote',
                'title',
                'description',
            ]);

            $data['is_active'] = $request->boolean('is_active');

            OurStory::create($data);

            return redirect()
                ->route('our_stories')
                ->with('toast_success', 'Our Story added successfully.');

        } catch (\Exception $e) {

            Log::error('Our Story store failed: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('toast_error', 'Failed to save Our Story: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $ourStory = OurStory::findOrFail($id);

        return view('admin.our_stories.edit', compact('ourStory'));
    }

    public function update(Request $request, $id)
    {
        $ourStory = OurStory::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'year',
                'shortnote',
                'title',
                'description',
            ]);

            $data['is_active'] = $request->boolean('is_active');

            $ourStory->update($data);

            return redirect()
                ->route('our_stories')
                ->with('toast_success', 'Our Story updated successfully.');

        } catch (\Exception $e) {

            Log::error('Our Story update failed: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('toast_error', 'Failed to update Our Story: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $ourStory = OurStory::findOrFail($id);

        try {
            $ourStory->delete();

            return redirect()
                ->route('our_stories')
                ->with('toast_success', 'Our Story moved to trash.');

        } catch (\Exception $e) {

            Log::error('Our Story soft delete failed: ' . $e->getMessage());

            return redirect()
                ->route('our_stories')
                ->with('toast_error', 'Failed to delete Our Story.');
        }
    }

    public function restore($id)
    {
        $ourStory = OurStory::withTrashed()->findOrFail($id);

        $ourStory->restore();

        return redirect()
            ->route('our_stories')
            ->with('toast_success', 'Our Story restored.');
    }

    public function toggleStatus($id)
    {
        $ourStory = OurStory::findOrFail($id);

        $ourStory->is_active = ! $ourStory->is_active;
        $ourStory->save();

        return response()->json([
            'success'   => true,
            'is_active' => $ourStory->is_active,
        ]);
    }

    private function rules(): array
    {
        return [
            'year'        => 'required|string|max:255',
            'shortnote'   => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ];
    }
}