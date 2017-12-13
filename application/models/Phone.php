<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Phone extends Eloquent{
    protected $table='phone';
    protected $fillable=['domainname','areablock_id','localtel'];
    public $timestamps=false;
}

