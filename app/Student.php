<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];

    public function profit(){
        return $this->hasMany(ProfitStudent::class, 'student_id');
    }

    public function criteria(){
        return $this->hasOne(StudentCriteria::class, 'student_id');
    }

    public function class(){
        return $this->belongsTo(Room::class);
    }
}
