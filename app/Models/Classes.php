<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'class',
        'class_description',
        'teacher_id'
    ];

    public function pupils()
    {
        return $this->hasMany(Pupil::class,'class_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function teacher() 
    {
        return $this->belongsTo(Teacher::class);
    }
    
}
