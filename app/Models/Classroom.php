<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // The only field we need
        'grade_id',
    ];


    public function grade()
{
    return $this->belongsTo(Grade::class);
}
}