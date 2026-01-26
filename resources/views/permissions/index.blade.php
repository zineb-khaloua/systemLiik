@extends('layouts.app')



@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Permissions Système</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary-custom btn-lg">
            <i class="fas fa-plus-circle me-2"></i> Nouvelle Permission
        </a>
    </div>

    <div class="alert alert-info border-0 shadow-sm rounded-4 mb-4">
        <i class="fas fa-info-circle me-2"></i> Les permissions sont définies au niveau du code.
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <table id="permissionsTable" class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 rounded-start">ID</th>
                        <th class="border-0">Nom</th>
                        <th class="border-0">Role</th>
                        <th class="border-0">Créé le</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td class="fw-bold text-secondary">#{{ $permission->id }}</td>
                        <td>
                            <span class="fw-bold text-dark">{{ $permission->name }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $permission->roles->pluck('name')->implode(',') }}</span>
                        </td>
                        <td class="text-muted">
                            {{ $permission->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-light text-primary border" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"  class="form-delete d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger border" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@push('scripts')


<script>
    document.addEventListener('DOMContentLoaded',function(){
            const formDelete=document.querySelectorAll('.form-delete');
            formDelete.forEach(form=>{
                form.addEventListener('submit',function(e){
                    e.preventDefault();
                      Swal.fire({
                            title: ' Etes-vous sûr de vouloir supprimer cette permission ?',
                            text: " Cette action ne peut pas être annulée !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Oui, Supprimer',
                            cancelButtonText: 'Non,Annuler'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                });

            });
    });
    $(document).ready(function() {
        $('#permissionsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
            },
            pageLength: 10,
            lengthMenu: [10, 25, 50, 75, 100],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endpush
@endsection
