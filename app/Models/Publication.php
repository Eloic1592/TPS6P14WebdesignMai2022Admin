<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = "publication";
    protected $fillable = ['idarticle','etat','created_at','updated_at'];
    //POUR EVITER L'INSERTION DES COLONNES : UPDATE_AT, CREATE_AT
    public $timestamps = false;
}
