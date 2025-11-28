<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'date', 'time'];

    // provisório
    // protected function date(): Attribute {
    //     return Attribute::make(
    //         get: fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y'),
    //     );
    // }
}
