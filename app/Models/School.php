<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    protected $guard = 'school';

    protected $fillable = [
        'name',
        'address',
         'manager_name',
        'phone',
        'email',
        'password',
        'area',
        'state',
        'postal_code',
        'country',
        'grades_classes',
        'data',
         'logo',
     ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'grades_classes' => 'array',
    ];

    public function getLogoUrlAttribute()
    {
        return asset('storage/' . $this->logo);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function schoolClasses()
{
    return $this->hasMany(SchoolClass::class);
}
}