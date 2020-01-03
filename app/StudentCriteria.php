<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCriteria extends Model
{
    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function cop(){
        return $this->belongsTo(CriteriaParent::class, 'criteria_parent_id');
    }
    public function cpi(){
        return $this->belongsTo(CriteriaParentIncome::class, 'criteria_parent_income_id');
    }
    public function other(){
        return $this->belongsTo(CriteriaOther::class, 'criteria_other_id');
    }
}
