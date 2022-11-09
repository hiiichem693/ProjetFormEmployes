<?php

/** Description of Employe ...*/
namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Employe extends Model
{
    //On déclare la table Employe
    protected $table ='Employe';
    public $timestamps = false;
    protected $fillable = [
        'numEmp',
        'civilite',
        'prenoom',
        'nom',
        'pwd',
        'profil',
        'interet',
        'message'
    ];

}
