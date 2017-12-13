<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Level extends Eloquent{
    protected $table='level';
    protected $fillable=['title'];
    public $timestamps=false;
}

