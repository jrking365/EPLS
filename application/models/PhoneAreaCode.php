<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class PhoneAreaCode extends Eloquent{
    protected $table='phoneareacode';
    protected $fillable=['areacode','name','comment','countryprefix_id'];
    public $timestamps=false;
}

