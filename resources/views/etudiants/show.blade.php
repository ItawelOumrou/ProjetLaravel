@extends('template')
    @section('content')

    <div class="container">
        <div class="row">
           
            <div class="col-md-6 col-md-offset-2" >
            <div class="pull-left" style="margin-top: 51px">
                    <a href="{{url('etudiants')}}" class="btn btn-warning">Retour</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 >Les informations du patient</h4>
                    </div>
                
               
                    <div class="card-body">
                        
                        <table class="table" > 
                        <tr>
                                    <th>Matricule</th>
                                    <td> {{ $list->matricule }}
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td> {{$list->nom}} </td> 
                                </tr>

                                <tr>
                                    <th>Prénom</th>
                                    <td> {{$list->prenom}} <td> 
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td> {{$list->email}} </td> 
                                </tr>

                                <tr>
                                    <th>Numéro du téléphone</th>
                                    <td> {{$list->telephone}} </td> 
                                </tr>
                               
                            </tbody>
                        </table>
                </div>
                
            </div>
            
        </div>
        </div>
    </div>
    
@endsection