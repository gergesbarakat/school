<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use App\Models\School;
    use App\Models\Grade;
    use App\Models\Subject;
    use App\Models\Teacher;
 class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'grade_id',
        'class_id',
        'day',
        'time',
        'teacher_id',
        'subject_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

// app/Models/Schedule.php




    
}
