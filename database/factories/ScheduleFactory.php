<?php

// app/Models/Schedule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'grade_id', 'class_id', 'schedule_data'];

    protected $casts = [
        'schedule_data' => 'array', // Cast the JSON field to an array
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
