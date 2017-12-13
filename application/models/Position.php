<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Position extends Eloquent{
    
    protected $table ='position';
    protected  $fillable =['title'];
    public  $timestamp = false;
}