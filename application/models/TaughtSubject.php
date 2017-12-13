<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class TaughtSubject  extends Eloquent{
    protected $table='taughtsubject';
    protected $fillable=['year','teacher_id','subject_id','session_id'];
    public $timestamps=false;
}