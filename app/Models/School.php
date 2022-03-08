<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    public function Teachers()
    {
        return $this->hasOne(School::class);
    }
    public function Students()
    {
        return $this->hasOne(School::class);
    }
}
