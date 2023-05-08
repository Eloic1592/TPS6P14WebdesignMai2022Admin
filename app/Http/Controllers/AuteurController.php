<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use App\Models\Article;

class AuteurController extends Controller
{
    public function index()
    {
        return view('login-auteur');
    }


    public function accueilauteur()
    {
        $data=Article::query()->where('idauteur',session('auteur')->id);
        $liste_article=$data->simplePaginate(6);
        return view('acc-auteur',[
        'liste_article'=>$liste_article,
        'pagination'=>$liste_article->links(),
        ]);
    }

    public function login(Request $request)
    {
        $Auteur = Auteur::where('email',$request->input('email'))->where('password', md5($request->input('password')))->first();

        if($Auteur){
            session()->put('auteur', $Auteur);
            return  redirect()->route('auteur.accueilauteur');
            }
            return redirect()->back()->with('failure', 'Email ou mot de passe incorrect');
    }
    public function loginauteur()
    {
        return view('login-auteur');
    }

    public function deconnexion(){
        session()->forget('auteur');
        return view('login-auteur');
    }
}
