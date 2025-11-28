<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['title'];

    public function items() {
        return $this->hasMany(ChecklistItem::class);
    }
}
