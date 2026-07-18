$(document).ready(function() {
    // Initialize DataTable
    var table = $('#categoriesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: indexCategoryUrl,
            type: 'GET'
        },
        columns: [
            { data: 'nom_categorie', name: 'nom_categorie', className: 'fw-bold' },
            { data: 'description', name: 'description', render: function(data) {
                return data ? (data.length > 50 ? data.substr(0, 50) + '...' : data) : '<span class="text-muted small">Aucune description</span>';
            }},
            { data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'text-end' }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json"
        }
    });

    // Add Category
    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: indexCategoryUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addCategoryModal').modal('hide');
                $('#addCategoryForm')[0].reset();
                table.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: response.success,
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMsg = '';
                $.each(errors, function(key, value) {
                    errorMsg += value + '\n';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorMsg
                });
            }
        });
    });

    // Edit Category (Opening modal and filling data)
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).data('id');
        $.get(indexCategoryUrl + '/' + id + '/edit', function(data) {
            $('#edit_category_id').val(data.id);
            $('#edit_nom_categorie').val(data.nom_categorie);
            $('#edit_description').val(data.description);
            $('#editCategoryModal').modal('show');
        });
    });

    // Update Category
    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#edit_category_id').val();
        $.ajax({
            url: indexCategoryUrl + '/' + id,
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editCategoryModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: response.success,
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMsg = '';
                $.each(errors, function(key, value) {
                    errorMsg += value + '\n';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorMsg
                });
            }
        });
    });
});

// Delete Category (global function for datatables/actions)
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Supprimé !',
                        text: response.success,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#categoriesTable').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    var msg = xhr.responseJSON.error || 'Une erreur est survenue.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: msg
                    });
                }
            });
        }
    });
}
