<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class EmailDomain  extends Eloquent{
    protected $table='emaildomain';
    protected $fillable=['domainname'];
    public $timestamps=false;
}
