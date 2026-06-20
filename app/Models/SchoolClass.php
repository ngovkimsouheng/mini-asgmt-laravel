<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// 👇 Subjects in this class
class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = ['class_name', 'grade'];

    // 👇 Students in this class
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}
