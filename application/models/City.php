<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class City extends Eloquent{
    
    protected $table='city';
    protected $fillable=['name','region_id'];
    public $timestamps=false;
}
