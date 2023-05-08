<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    // recherche de la liste d'article
    public function recherchearticle(Request $request) {

        $query =Article::query();
        if ($request->has('categorie')) {
            $query->where('categorie', 'like', '%' . $request->input('categorie') . '%'); }
        if ($request->has('contenu')) {
            $query->where('contenu', 'like', '%' . $request->input('contenu') . '%'); }
        if ($request->has('titre')) {
            $query->where('titre', 'like', '%' . $request->input('titre') . '%'); }

        $recherchearticle = $query->simplePaginate(3);
        //  dd($recherchearticle);
        return redirect()->back()->with('recherchearticle', $recherchearticle);
    }

    // Vers ajouter un article
    public function redirectajout()
    {
        return view('ajoutarticle');
    }

    // Ajouter
    public function ajoutcontenu(Request $request)
        {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $filename = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/assets/img',$filename);

        $Article=Article::create(
            [
                'categorie'=>$request->input('categorie'),
                'titre'=>$request->input('titre'),
                'resume'=>$request->input('resume'),
                'contenu'=>$request->input('contenu'),
                'idauteur'=>$request->input('idauteur'),
                'image'=>$request->file('image')->getClientOriginalName()
            ]
        );
        }else{
            $Article=Article::create(
                [
                    'categorie'=>$request->input('categorie'),
                    'titre'=>$request->input('titre'),
                    'resume'=>$request->input('resume'),
                    'contenu'=>$request->input('contenu'),
                    'idauteur'=>$request->input('idauteur')
                ]
            );
        }

        DB::table('publication')->insert([
            'idarticle' =>$Article->id,
        ]);

        return redirect()->route('auteur.accueilauteur')->with('success','Informations enregistrees');
     }

    // Modifier
    public function getmodif($id)
    {
        $Article=Article::find($id);

        return view('modif',['Article'=>$Article]);
    }

    public function modifierarticle(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/assets/img',$filename);
            $Article=Article::where('id',$request->input('idarticle'))->update(['titre'=>$request->input('titre'),
            'resume'=>$request->input('resume'),
            'categorie'=>$request->input('categorie'),
            'contenu'=>$request->input('contenu'),
            'image'=>$request->file('image')->getClientOriginalName()
        ]);
        }else{
            $Article=Article::where('id',$request->input('idarticle'))->update(['titre'=>$request->input('titre'),
            'resume'=>$request->input('resume'),
            'categorie'=>$request->input('categorie'),
            'contenu'=>$request->input('contenu')
            ]);
        }

        $Publication=Publication::where('idarticle',$request->input('idarticle'))->update(['update_at'=>DB::raw('CURRENT_TIMESTAMP')]);
        return redirect()->back()->with('success','Informations enregistrees');

    }

    // Publier
    public function publier($id)
    {
        Publication::where('idarticle',$id)->update(['etat'=>2]);
        return redirect()->back()->with('success','Article publie');
    }

    // Details
    public function details($id){
        $Article=Article::find($id);
        return view('details',['Article'=>$Article]);
    }






}
