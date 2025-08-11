<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
