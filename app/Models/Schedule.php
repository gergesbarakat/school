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
        'classroom_id',
         'teacher_id',
        'classes_per_week',
        'row_id',

        'subject_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

// app/Models/Schedule.php





}