<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    protected $fillable = ['id', 'categorie', 'titre', 'resume', 'image', 'contenu', 'idauteur'];
    //POUR EVITER L'INSERTION DES COLONNES : UPDATE_AT, CREATE_AT
    public $timestamps = false;

    public function getAuteurnameAttribute(){
        $auteur=Auteur::find($this->attributes['idauteur']);
        return "<td>".$auteur->nom.' '.$auteur->prenom."</td>";
    }

    public function getPhotoAttribute(){
        $asset= route('storage'.$this->attributes['image']);

        if($this->attributes['image']){
        return  "<img src='".$asset."' class='card-img-top'>";
        }

}
    public function getDetailsAttribute(){

        $url = url('/Article/details/' . $this->attributes['id']);
        return  "<button type='button' class='btn btn-outline-primary'><a href='" . $url . "'>Details</a></button>";
}


    public function getModifierAttribute(){


            $url = route('article.modifyarticle', ['id' => $this->attributes['id']]);
            return "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
    }
    public function getPublierattribute(){

        $Publication=Publication::where('idarticle', $this->attributes['id'])->first();

        if($Publication->etat==1){
            $url = route('article.publisharticle', ['id' => $this->attributes['id']]);
            return "<button type='button' class='btn btn-secondary'><a style='color:white;' href='" . $url . "'>Publier</a></button>";
        }
        return "<button type='button' class='btn btn-danger' disabled>Publie</button>";

    }
    public function getDatepublicAttribute(){
        $Publication=Publication::where('idarticle', $this->attributes['id'])->first();
        return " <p><span class='badge bg-light text-dark'>Publie le ".$Publication->created_at."</span></p>";
        }

}
