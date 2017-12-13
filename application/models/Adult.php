<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Adult extends Eloquent{
    
    protected $table = 'adult';
    protected $fillable =['firstname','name','dob','email_id','phone_id','address_id','gender'];
    public $timestamps = false;
}