<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Couple extends  Eloquent{
    protected $table='couple';
    protected $fillable=['father_id','mother_id'];
    public $timestamps=false;
    
}

