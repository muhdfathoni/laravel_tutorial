<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id',
        'faculty_id',
        'courses_id',
        'email'
    ];
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function class()
    {
        return $this->belongstoMany(Classes::class, 'user_has_classes');
    }

}
