<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Region extends Eloquent{
    protected $table='region';
    protected $fillable=['name','country_id'];
    public $timestamps=false;
}
