@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Rôles et Permissions</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rôles</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary-custom btn-lg">
            <i class="fas fa-shield-alt me-2"></i> Nouveau Rôle
        </a>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stats-card bg-white border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-primary-subtle text-primary mb-0 me-3">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase fw-bold mb-1">Total Rôles</h6>
                        <h2 class="fw-bold m-0">{{$roleCount}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
             <div class="stats-card bg-white border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-success-subtle text-success mb-0 me-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase fw-bold mb-1">Permissions</h6>
                        <h2 class="fw-bold m-0">{{$permissionCount}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h5 class="fw-bold m-0">Liste des Rôles</h5>
            <div class="input-group w-25">
                 <span class="input-group-text bg-light border-0 ps-3"><i class="fas fa-search text-muted"></i></span>
                 <input type="text" class="form-control bg-light border-0 py-2" placeholder="Rechercher...">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th width="20%">Rôle</th>
                        <th width="40%">Permissions</th>
                        <th width="25%">Utilisateurs</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="avatar bg-danger text-white me-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; font-size: 1rem;"><i class="fas fa-crown"></i></span>
                                <span class="fw-bold text-dark fs-5">{{$role->name}}</span>
                            </div>
                        </td>
                        
                        <td>
                           @forelse($role->permissions as $permission)
                              <span class="badge bg-light text-dark border me-1 mb-1">
                                  {{ $permission->name }}
                              </span>
                           @empty
                               <span class="text-muted fst-italic">No permissions</span>
                           @endforelse
                        </td>

                        <td>
                            <div class="d-flex flex-wrap">
                                @forelse($role->users->take(3) as $user)
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle me-1 mb-1 fs-6 px-3 py-2">
                                        {{ $user->name }}
                                    </span>
                                @empty
                                    <span class="text-muted small fst-italic">Aucun utilisateur</span>
                                @endforelse
                                
                                @if($role->users->count() > 3)
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle me-1 mb-1">
                                        +{{ $role->users->count() - 3 }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        
                        <td class="text-end">
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-light btn-sm text-primary me-1"><i class="fas fa-edit"></i></a>
                           @can('delete',$role)
                            <form action="{{ route('roles.destroy', $role) }}" 
                            method="POST" class="form-delete d-inline"  >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm text-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const formDelete= document.querySelectorAll('.form-delete')
        formDelete.forEach(form=>{
            form.addEventListener('submit', function(e){
                e.preventDefault();
                Swal.fire({
                title: ' Etes-vous sûr de vouloir supprimer ce rôle ?',
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
</script>
@endpush