<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Student extends Eloquent{
    protected $table='student';
    protected $fillable=['child_id','category','status','matricule','level_id'];
    public $timestamps=false;
}

