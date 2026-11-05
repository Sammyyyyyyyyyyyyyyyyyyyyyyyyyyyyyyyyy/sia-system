<?php

namespace App\Http\Controllers;

use App\Models\ClassroomLink;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassroomLinkController extends Controller
{
    private array $allowedBlocks = [
        '3-A', '3-B', '3-C', '3-D', '3-E', '3-L'
    ];

    public function store(Request $request, string $block)
    {
        $request->validate([
            'google_classroom_url' => [
                'required',
                'url',
                'max:2048',
                'regex:/^https:\/\/classroom\.google\.com\//i',
            ],
        ]);

        abort_unless(in_array($block, $this->allowedBlocks, true), 404);

        ClassroomLink::updateOrCreate(
            ['block' => $block],
            ['google_classroom_url' => $request->google_classroom_url]
        );

        return redirect()
            ->route('sia.classroom', ['block' => $block])
            ->with('success', 'Google Classroom link saved successfully!');
    }

    public function update(Request $request, string $block)
    {
        return $this->store($request, $block);
    }

    public function destroy(string $block)
    {
        abort_unless(in_array($block, $this->allowedBlocks, true), 404);

        ClassroomLink::where('block', $block)->delete();

        return redirect()
            ->route('sia.classroom', ['block' => $block])
            ->with('success', 'Google Classroom link deleted successfully!');
    }
}