<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- data table cdn Css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Fin data table cdn -->
</head>
<body>
    <!-- Data table Cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#datatable').DataTable({
              
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

<!-- Fin data table cdn -->
</body>
</html>