<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Employee extends Eloquent{
    
    protected $table ='employee';
    protected  $fillable = ['person_id','hiring_date','position_id','status','comment','password'];
    public  $timestamps = false;
}
