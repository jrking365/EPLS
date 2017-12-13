<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class ExistingSubject extends Eloquent{
    protected $table='existingsubject';
    protected $fillable=['code','title','level_id'];
    public $timestamps=false;
}
