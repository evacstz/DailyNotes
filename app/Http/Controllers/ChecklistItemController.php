<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function destroy(ChecklistItem $item)
    {
        $checklist = $item->checklist; // Salva a ref antes de deletar para o redirect
        $item->delete();
        return redirect()->route('checklists.show', $checklist);
    }

    public function toggle(ChecklistItem $item)
    {
        $item->update([
            'concluido' => !$item->concluido
        ]);

        return redirect()->back();
    }
}