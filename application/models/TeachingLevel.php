<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TeachingLevel extends Eloquent{
    
    protected $table ='Teaching_level';
    protected $fillable =['title'];
    public $timestamps = false;
}

