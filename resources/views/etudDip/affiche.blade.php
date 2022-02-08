@extends('template')
    @section('content')

    <div class="container">
        <div class="row">
           
            <div class="col-md-6 col-md-offset-2" >
            <div class="pull-left" style="margin-top: 51px">
                    <a href="{{url('etudDip')}}" class="btn btn-warning">Retour</a>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 >Les diplomes de 
                        @foreach($list as $liste)
                            @foreach($et as $ed)
                                @if($liste->id == $ed->reference)   
                                    {{$liste->prenom}} {{$liste->nom}}
                                    @break
                                @endif
                            @endforeach
                        @endforeach
                        </h4>
                    </div>
                
               
                    <div class="card-body">
                        
                        <table class="table" > 
                                <tr class="table-primary">
                                    <th>Intitulé</th>
                                        <th>Nom de l'établissement</th>
                                </tr>
                        @foreach($et as $et)
                                <tr>
                                    <th>{{$et->intitule}}</th>
                                    <th> {{$et->nomEtablissement}} </th> 
                                </tr>
                               
                           @endforeach
                        </table>
                </div>
                
            </div>
            
        </div>
        </div>
    </div>
    
@endsection