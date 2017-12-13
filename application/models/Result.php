<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Result extends Eloquent{
    protected $table='results';
    protected $fillable=['student_id','year','taughtsubject_id','grade','comment'];
    public $timestamps=false;
}