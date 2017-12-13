<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class TeacherGrade extends Eloquent{
    protected $table='teacher_grade';
    protected $fillable=['title'];
    public $timestamps=false;
}

