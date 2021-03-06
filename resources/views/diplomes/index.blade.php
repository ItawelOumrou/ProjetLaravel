@extends('template')
 <!-- data table cdn Css -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Fin data table cdn -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 mt-3">
        <a href="{{url('diplomes/ajout')}}" class="btn btn-primary" 
                data-toggle="tooltip" data-placement="top" title="Ajouter un Diplome">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
            <div class="card mt-2">
                <div class="card-header">
                    <h1>Liste des diplomes</h1>
                </div>
                <div class="card-body">
                <table id="data"  class="table"  style="font-size: 15px"> 
                            <thead class="table-primary">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Intitulé</th>
                                    <th>Nom de l'établissement</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($et as $et)
                                @foreach($list as $liste)
                                
                                    <tr>
                                        @if($liste->reference == $et->id)
                                        <td> {{$et->nom}} </td> 
                                        <td> {{$et->prenom}} </td> 
                                        
                                        
                                        <td> {{$liste->intitule}} </td>
                                        <td> {{$liste->nomEtablissement}}  </td> 
                                        <td>
                                            <a href="{{url('diplomes/'.$liste->id.'/edit')}}" class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Editer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                </svg>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#ModalDelete{{$liste->id}}"  data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                            </a>
                                            @include('diplomes.delete')
                                            </td>
                                            
                                    </tr>
                                    @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#data').DataTable({
              
                "language": {
                                  "decimal":        "",
                                "emptyTable":     "aucune donnée disponible",
                                "info":           "Affichage de _START_ à _END_ entrées sur _TOTAL_",
                                "infoEmpty":      "Affichage de 0 à 0 sur 0 entrées",
                                "infoFiltered":   "(filtré à partir de _MAX_ entrées totales)",
                                "infoPostFix":    "",
                                "thousands":      ",",
                                "lengthMenu":     "Afficher les entrées _MENU_",
                                "loadingRecords": "Chargement...",
                                "processing":     "Traitement...",
                                "search":         "Rechercher:",
                                "zeroRecords":    "Aucun enregistrements correspondants trouvés",
                                "paginate": {
                                    "first":      "Première",
                                    "last":       "Dernièr(e)",
                                    "next":       "Prochain(e)",
                                    "previous":   "Précédent(e)"
                                },
                                "aria": {
                                    "sortAscending":  ": activer pour trier les colonnes par ordre croissant",
                                    "sortDescending": ": activer pour trier les colonnes par ordre décroissant"
                                }
                    },
                    "lengthMenu": [ 5,10, 25]
        });
        } );
    </script>