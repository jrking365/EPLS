<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Utilisateur extends Eloquent{

    protected $table = 'utilisateur' ;
    
    protected $fillable = ['nom', 'prenom', 'login', 'motpasse'];
    
    public $timestamps = false;
}