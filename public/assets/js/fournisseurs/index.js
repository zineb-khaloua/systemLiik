$(document).ready(function(){
    $('#fournisseursTable').DataTable({
        "language": {
            "search": "Rechercher:",
            "lengthMenu": "Afficher _MENU_ entrées",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            },
            "zeroRecords": "Aucun enregistrement correspondant trouvé",
            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
            "infoFiltered": "(filtré à partir de _MAX_ entrées au total)"
        },
        processing: true,
        serverSide: true,
        ajax: {
      url: indexFournisseurUrl,
      type: 'GET', 
      headers: { 
        'X-Requested-With': 'XMLHttpRequest' 
      },error: function(xhr, status, error) {
console.log('AJAX Error:', xhr.responseText);
}
    },
        columns: [
            { data: 'nom_fournisseur', name: 'nom_fournisseur' },
            { data: 'contact_nom', name: 'contact_nom' },
            { data: 'telephone', name: 'telephone' },
            { data: 'email', name: 'email' },
            { data: 'adresse', name: 'adresse' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false } // <-- match controller
        ],
    });
});

function deleteItem(route, id) {

    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Cette action est irréversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler'
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: '/' + route + '/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    Swal.fire(
                        'Supprimé !',
                        response.message,
                        'success'
                    );

                   $('#' + route + 'Table').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    Swal.fire(
                        'Erreur',
                        'Une erreur est survenue.',
                        'error'
                    );
                }
            });

        }

    });
}
