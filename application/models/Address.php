<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent{
    
    protected $table='address';
    protected $fillable =['civicnumber','street','city_id','postalcode'];
    public $timestamps=false;
}