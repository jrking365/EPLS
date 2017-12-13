<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Session extends Eloquent{
    protected $table='session';
    protected $fillable=['title'];
    public $timestamps=false;
}
