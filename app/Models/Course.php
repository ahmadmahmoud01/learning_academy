<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Trainer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }

}
