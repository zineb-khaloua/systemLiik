@extends('layouts.app')

@section('content')


<div class="container-fluid p-0">
    <form action="{{route('roles.store')}}" method="POST" >
        @csrf
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Nouveau Rôle</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="text-decoration-none">Rôles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('roles.index') }}" class="btn btn-light btn-lg border me-2">Annuler</a>
            <button class="btn btn-primary-custom btn-lg"><i class="fas fa-save me-2"></i> Enregistrer</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
             <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h5 class="fw-bold mb-4">Détails du Rôle</h5>
                <div class="mb-3">
                    <label class="form-label text-muted fw-bold">Nom du Rôle</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-lg bg-light border-0  @error('name') is-invalid @enderror" placeholder="Ex: Comptable">
                    @error('name')
                  <div class="invalid-feedback">{{$message}}</div>
                   @enderror 
                   </div>
             </div>
        </div>
        
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Permissions</h5>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label fw-bold" for="selectAll">Tout sélectionner</label>
                    </div>
                </div>

                <div class="row g-4">
    <div class="col-12">
        <div class="p-3 bg-light rounded-4">
            <h6 class="fw-bold text-primary mb-3">
                <i class="fas fa-shield-alt me-2"></i> Permission
            </h6>

            @error('permissions')
                <div class="alert alert-danger py-2">
                    {{ $message }}
                </div>
            @enderror

            <div class="row g-3">
                @foreach($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input
                                class="form-check-input permission-checkbox"
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                id="perm_{{ $permission->id }}"
                                {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
   document.addEventListener('DOMContentLoaded',function(){
    
    const selectAll= document.getElementById('selectAll');
    const permissions=  document.querySelectorAll('.permission-checkbox');

    selectAll.addEventListener('change',function(){
        permissions.forEach(checkbox=>{
            checkbox.checked=selectAll.checked;
        });
    });
    permissions.forEach(checkbox=>{
        checkbox.addEventListener('change',function(){
            selectAll.checked=[...permissions].every(cb=>cb.checked);
        });
    });

   });

</script>
@endpush

