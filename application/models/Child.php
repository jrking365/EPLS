<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Child extends Eloquent{
    
    protected $table='child';
    protected $fillable=['biological_parents_id','fatherside_newcouple_id','motherside_newcouple_id','firstname','lastname','sexe','dob','ministryid','healthcareid'];
    public $timestamps=false;
}