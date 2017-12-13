<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Teacher extends Eloquent{
    
    protected $table ='teacher';
    protected $fillable =['employee_id','grade_id','certified_teaching_level_id','status'];
    public $timestamps = false;
}

