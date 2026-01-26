@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Nouvelle Permission</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" class="text-decoration-none">Permissions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('permissions.index') }}" class="btn btn-light btn-lg border">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('permissions.store') }}" method="POST" id="permissionForm">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nom de la Permission</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 @error('name') is-invalid @enderror" 
                                id="name" name="name" value="{{ old('name') }}" placeholder="ex: manage users" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text mt-2 text-muted">
                                <i class="fas fa-info-circle me-1"></i> Utilisez des noms explicites en anglais (ex: <code>create posts</code>, <code>edit users</code>).
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold m-0">Assigner aux Rôles</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="selectAllRoles">
                            <label class="form-check-label fw-bold" for="selectAllRoles">Tout sélectionner</label>
                        </div>
                    </div>

                    <div class="row g-3">
                        @forelse($roles as $role)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input 
                                    class="form-check-input role-checkbox" 
                                    type="checkbox" 
                                    name="roles[]" 
                                    value="{{ $role->name }}" 
                                    id="role_{{ $role->id }}"
                                    form="permissionForm"
                                    {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role_{{ $role->id }}">
                                    <i class="fas fa-shield-alt me-2 text-primary"></i>{{ $role->name }}
                                </label>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-muted fst-italic">Aucun rôle disponible</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('permissions.index') }}" class="btn btn-light btn-lg border">Annuler</a>
                        <button type="submit" form="permissionForm" class="btn btn-primary-custom btn-lg px-4">
                            <i class="fas fa-save me-2"></i> Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllRoles = document.getElementById('selectAllRoles');
        const roleCheckboxes = document.querySelectorAll('.role-checkbox');

        if (selectAllRoles) {
            selectAllRoles.addEventListener('change', function() {
                roleCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllRoles.checked;
                });
            });

            roleCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    selectAllRoles.checked = [...roleCheckboxes].every(cb => cb.checked);
                });
            });
        }
    });
</script>
@endpush
