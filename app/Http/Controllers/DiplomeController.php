<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diplome;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Session;
use DB;

class DiplomeController extends Controller
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
        $list =  Diplome::all();
        $et =  Etudiant::all();
        return view('diplomes.index',['list'=>$list,'et'=>$et]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $et =  Etudiant::all();
        return view('diplomes.ajout',['et'=>$et]);
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
            
            'intitule'=> 'regex:/^[A-Z]+[A-Za-z]+$/',
            'nomEtablissement' => 'regex:/^[A-Z]+[A-Za-z]+$/',
        ),
        [
           
            'intitule.regex'=> "l'intitule doit commencer par une lettre majuscule ou l'intitulé sélectionné n'est pas valide",
            'nomEtablissement.regex'=> "le nom de l'etablissement doit commencer par une lettre majuscule ou le nom de l'etablissement sélectionné n'est pas valide",
            
        ]);
        $et = new Diplome();
        $et->intitule=$request->input('intitule');
        $et->reference=$request->input('reference');
        $et->nomEtablissement=$request->input('nomEtablissement');

        $et->save();
        Session::flash('icon','success');
        return redirect('diplomes')->with('titre','Diplome ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dp = Diplome::find($id);
        $et = Etudiant::all();
        return view('diplomes.edit',['et'=>$et,'dp' => $dp]);
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
            
            'intitule'=> 'regex:/^[A-Z]+[A-Za-z]+$/',
            'nomEtablissement' => 'regex:/^[A-Z]+[A-Za-z]+$/',
        ),
        [
           
            'intitule.regex'=> "l'intitule doit commencer par une lettre majuscule",
            'nomEtablissement.regex'=> "le nom de l'etablissement doit commencer par une lettre majuscule",
            
        ]);
        $et =  Diplome::find($id);
        $et->intitule=$request->input('intitule');
        $et->reference=$request->input('reference');
        $et->nomEtablissement=$request->input('nomEtablissement');

        $et->save();
        Session::flash('icon','info');
        return redirect('diplomes')->with('titre','Diplome modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = DB::select('select count(reference) from diplomes');
dd($count);
        if(count($count) == 1){
            Session::flash('icom','error');
            return redirect('diplomes')->with('titre',"Vous n'avez pas le droit de supprimer cette diplome");
        }
        
        DB::table('diplomes')->where('id', $id)->delete();

        Session::flash('icom','error');
        return redirect('diplomes')->with('titre','Diplome supprimer avec succès');
    
    }
}
