<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $table = 'checklists_items';
    
    protected $fillable = ['checklist_id', 'text', 'concluido'];

    public function checklist() {
        return $this->belongsTo(Checklist::class);
    }
}
