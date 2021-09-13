<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'start',
        'end'
    ];

    public function student()
    {
        return $this->belongstoMany(Student::class, 'user_has_classes', 'student_id', 'classes_id');
    }
}
