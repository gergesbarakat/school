<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // The only field we need
    ];

    public function classrooms()
{
    return $this->hasMany(Classroom::class);
}

    public function schools()
{
    return $this->belongsToMany(School::class)->withPivot('number_of_classes')->withTimestamps();
}

}
