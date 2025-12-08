<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Http\Requests\ChecklistRequest;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklists = Checklist::with('items')->get();
        return view('checklists.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('checklists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChecklistRequest $request)
    {
        $validated = $request->validated();

        $checklist = Checklist::create([
            'title' => $validated['title']
        ]);

        foreach ($validated['items'] as $itemText) {
            $checklist->items()->create([
                'text' => $itemText,
                'concluido' => false
            ]);
        }
        return redirect()->route('checklists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist)
    {
        $checklist->load('items');
        return view('checklists.show', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist)
    {
        return view('checklists.edit', compact('checklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChecklistRequest $request, Checklist $checklist)
    {
        $validated = $request->validated();

        $checklist->update([
            'title' => $validated['title']
        ]);

        $submittedItems = $validated['items'] ?? [];

        foreach ($validated['items'] as $index => $itemText) {
            if (isset($checklist->items[$index])) {
                $checklist->items[$index]->update([
                    'text' => $itemText
                ]);
            } else {
                $checklist->items()->create([
                    'text' => $itemText,
                    'concluido' => false
                ]);
            }
        }
        return redirect()->route('checklists.show', $checklist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('checklists.index');;
    }
}
