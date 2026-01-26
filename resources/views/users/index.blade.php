@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Breadcrumbs -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-users"></i> Utilisateurs
                </li>
            </ol>
        </nav>
    </div>
    
    <div class="row g-4">
        <!-- Users Column -->
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0 text-dark">Utilisateurs</h2>
                <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus me-2"></i> Nouvel Utilisateur
                </button>
            </div>
            @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table custom-table mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Rôle</th>
                                <th>Email</th>
                                <th>Dernière connexion</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-primary text-white me-3 rounded-circle" style="width: 40px; height: 40px;">AU</div>
                                        <div>
                                            <div class="fw-bold"> {{$user->name }}</div>
                                            <small class="text-muted">ID: {{$user->id}}</small>
                                        </div>
                                    </div>
                                </td>
                                @foreach($user->roles as $role)
                                <td><span class="badge bg-dark">{{$role->name ?? '-'}}</span></td>
                                @endforeach

                                <td class="text-muted">{{$user->email}}</td>
                                <td class="text-muted small">{{$user->last_login_at}}</td>
                                <td><span class="status-badge status-success">{{$user->status}}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></a>
                                    @can('delete',$user)
                                     <form method="POST" class="form-delete d-inline" action="{{route('users.destroy', $user)}}">
                                          @csrf 
                                          @method('DELETE')
                                     <button type="submit" class="btn btn-sm btn-light text-danger">
                                             <i class="fas fa-trash"></i>
                                    </button>
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

        <!-- Roles & Permissions Column -->
        
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom-0 p-4 pb-0">
                <h5 class="modal-title fw-bold">Nouvel Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3" id="addUserForm" method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nom complet</label>
                        <input type="text" name="name" class="form-control" placeholder="Nom Prénom">
                    </div>
                     <div class="col-md-6">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email@exemple.com">
                    </div>
                     <div class="col-md-6">
                        <label class="form-label fw-bold">Mot de passe</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                     <div class="col-md-6">
                        <label class="form-label fw-bold">Confirmer mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control" >
                    </div>
                     <div class="col-md-12">
                        <label class="form-label fw-bold">Rôle</label>
                        <select class="form-select" name="role">
                            <option>admin</option>
                            <option>commercial</option>
                            <option>comptable</option>
                        </select>
    
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0 p-4 pt-0">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="addUserForm" class="btn btn-primary-custom px-4">Créer l'utilisateur</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const forms = document.querySelectorAll('.form-delete');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
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
