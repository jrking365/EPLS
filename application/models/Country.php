<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Country extends Eloquent{
    
    protected $table='country';
    protected $fillable=['name','phoneprefix'];
    public $timestamps=false;
}