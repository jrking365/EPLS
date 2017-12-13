<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Email extends Eloquent{
    protected $table='email';
    protected $fillable=['localpart','domain_id'];
    public $timestamps=false;
}
