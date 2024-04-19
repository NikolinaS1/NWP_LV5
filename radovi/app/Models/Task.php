<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'naziv_rada',
        'naziv_rada_eng',
        'zadatak_rada',
        'tip_studija',
        'teacher_id',
        'student_id'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'student_id');
    }

    public function getStudent()
    {
        if ($this->student_id != null) {
            return User::find($this->student_id);
        }
        return null;
    }
}
