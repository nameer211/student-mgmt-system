<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $guarded = [];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class,'student_id','id');
    }
}
