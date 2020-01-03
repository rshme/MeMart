<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitStudent extends Model
{
    protected $guarded = ['id'];

    protected $table = 'profit_student';

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function profit(){
        return $this->belongsTo(Profit::class);
    }
}
