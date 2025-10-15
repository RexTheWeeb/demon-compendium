<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = ['name', 'alignment'];

    public function demons()
    {
        return $this->hasMany(Demon::class);
    }
}
