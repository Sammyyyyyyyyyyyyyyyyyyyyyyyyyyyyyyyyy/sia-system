<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    private array $allowedBlocks = [
        '3-A', '3-B', '3-C', '3-D', '3-E', '3-L'
    ];

    private function validationRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'instructions' => 'nullable|string|max:10000',
            'due_at' => 'nullable|date',
            'blocks' => 'required|array|min:1',
            'blocks.*' => 'required|string|in:3-A,3-B,3-C,3-D,3-E,3-L',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:10240',
        ];
    }

    // Create a new activity and assign it to selected blocks.
    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());

        $filePath = null;
        $fileName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $filePath = $file->store('activities', 'local');
            $fileName = $file->getClientOriginalName();
        }

        try {
            DB::transaction(function () use (
                $validated,
                $filePath,
                $fileName
            ) {
                $activity = Activity::create([
                    'user_id' => Auth::id(),
                    'title' => $validated['title'],
                    'instructions' => $validated['instructions'] ?? null,
                    'due_at' => $validated['due_at'] ?? null,
                    'attachment_path' => $filePath,
                    'attachment_name' => $fileName,
                ]);

                foreach (array_unique($validated['blocks']) as $block) {
                    ActivityBlock::create([
                        'activity_id' => $activity->id,
                        'block' => $block,
                    ]);
                }
            });
        } catch (\Throwable $e) {
            if ($filePath) {
                Storage::disk('local')->delete($filePath);
            }

            throw $e;
        }

        return back()->with('success', 'Activity posted successfully!');
    }

    // Update an existing activity.
    public function update(Request $request, int $id)
    {
        $activity = Activity::where('user_id', Auth::id())
            ->findOrFail($id);

        $validated = $request->validate($this->validationRules());

        $newFilePath = null;
        $newFileName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $newFilePath = $file->store('activities', 'local');
            $newFileName = $file->getClientOriginalName();
        }

        $oldFilePath = $activity->attachment_path;

        try {
            DB::transaction(function () use (
                $activity,
                $validated,
                $newFilePath,
                $newFileName
            ) {
                $activity->update([
                    'title' => $validated['title'],
                    'instructions' => $validated['instructions'] ?? null,
                    'due_at' => $validated['due_at'] ?? null,
                    'attachment_path' => $newFilePath ?? $activity->attachment_path,
                    'attachment_name' => $newFileName ?? $activity->attachment_name,
                ]);

                $activity->blocks()->delete();

                foreach (array_unique($validated['blocks']) as $block) {
                    ActivityBlock::create([
                        'activity_id' => $activity->id,
                        'block' => $block,
                    ]);
                }
            });
        } catch (\Throwable $e) {
            if ($newFilePath) {
                Storage::disk('local')->delete($newFilePath);
            }

            throw $e;
        }

        if ($newFilePath && $oldFilePath) {
            Storage::disk('local')->delete($oldFilePath);
        }

        return back()->with('success', 'Activity updated successfully!');
    }

    // Delete an activity.
    public function destroy(int $id)
    {
        $activity = Activity::where('user_id', Auth::id())
            ->findOrFail($id);

        $filePath = $activity->attachment_path;

        $activity->delete();

        if ($filePath) {
            Storage::disk('local')->delete($filePath);
        }

        return back()->with('success', 'Activity deleted successfully!');
    }

    // Securely download an instructor's own activity attachment.
    public function download(int $id)
    {
        $activity = Activity::where('user_id', Auth::id())
            ->findOrFail($id);

        abort_unless(
            $activity->attachment_path &&
            Storage::disk('local')->exists($activity->attachment_path),
            404
        );

        return Storage::disk('local')->download(
            $activity->attachment_path,
            $activity->attachment_name
        );
    }
}