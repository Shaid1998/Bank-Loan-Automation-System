<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
