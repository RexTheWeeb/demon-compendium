<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demon extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
