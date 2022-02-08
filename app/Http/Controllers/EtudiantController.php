<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Diplome;
use Illuminate\Support\Facades\Session;
use DB;

class EtudiantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list =  Etudiant::all();
        return view('etudiants.index',['list'=>$list]);
    }

    public function index2()
    {
        $list =  Etudiant::all();
        return view('etudDip.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.ajout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            
            'telephone'=>'size:8|required|unique:etudiants',
            'email'=>'required|unique:etudiants',
            'matricule'=>'required|unique:etudiants',
            
            'intitule'=> 'regex:/^[A-Z]+[A-Za-z]+$/',
            'nomEtablissement' => 'regex:/^[A-Z]+[A-Za-z]+$/',
        ),
        [
           
            'intitule.regex'=> "l'intitule doit commencer par une lettre majuscule",
            'nomEtablissement.regex'=> "le nom de l'etablissement doit commencer par une lettre majuscule",
           
            'telephone.size'=> 'Ce champ doit comporter exactement 8 chiffres',
            'telephone.unique'=> "Ce numéro du téléphone est existe déjà",
            'telephone.required'=> "le numéro du téléphone est obligatoire",

            'email.unique'=> "Cet email est existe déjà",
            'email.required'=> "l'email' est obligatoire",

            'matricule.unique'=> "Ce matricule est existe déjà",
            'matricule.required'=> "le matricule est obligatoire",
            
        ]);

        $pt = new Etudiant();
       $pt->nom=$request->input('nom');
       $pt->prenom=$request->input('prenom');
       $pt->matricule=$request->input('matricule');
       $pt->email=$request->input('email');
       $pt->telephone=$request->input('telephone');

       $pt->save();
       $p = new Diplome();
       $p->reference= $pt->id;
       $p->intitule=$request->input('intitule');
       $p->nomEtablissement=$request->input('nomEtablissement');

        $p->save();
       Session::flash('icon','success');
        return redirect('etudiants')->with('titre','Etudiants ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Etudiant::find($id);
        return view('etudiants.show',['list'=>$list]);
    }

    public function affiche($id)
    {
        $et = Diplome::Where('reference',$id)->get();
        $list = Etudiant::all();
        
        return view('etudDip.affiche',['list'=>$list,'et'=>$et]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wilay = Etudiant::find($id);
        return view('etudiants.edit',['list' => $wilay]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            
            'telephone'=>'size:8|required|unique:etudiants,telephone,'.$id,
            'email'=>'required|unique:etudiants,email,'.$id,
            'matricule'=>'required|unique:etudiants,matricule,'.$id,
            
           
        ),
        [
           
            'telephone.size'=> 'le numero du telephone doit contenir 8 caractères',
            'telephone.unique'=> "Ce numéro du téléphone est  déjà utilisée",
            'telephone.required'=> "le numéro du téléphone est obligatoire",

            'email.unique'=> "Cet email est existe déjà",
            'email.required'=> "l'email' est obligatoire",

            'matricule.unique'=> "Ce matricule est existe déjà",
            'matricule.required'=> "le matricule est obligatoire",
            
        ]);
        
        $pt =Etudiant::find($id);
       $pt->nom=$request->input('nom');
       $pt->prenom=$request->input('prenom');
       $pt->matricule=$request->input('matricule');
       $pt->email=$request->input('email');
       $pt->telephone=$request->input('telephone');

       $pt->save();
       Session::flash('icon','info');
        return redirect('etudiants')->with('titre','Etudiant modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('etudiants')->where('id', $id)->delete();

        Session::flash('icom','error');
        return redirect('etudiants')->with('titre','Etudiant supprimer avec succès');
    }
}
