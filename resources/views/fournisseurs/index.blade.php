@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Gestion des Fournisseurs</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fournisseurs</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary-custom btn-lg">
            <i class="fas fa-plus me-2"></i> Nouveau Fournisseur
        </a>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Total Fournisseurs</h6>
                <h3 class="fw-bold text-dark m-0">145</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Nouveaux (ce mois)</h6>
                <h3 class="fw-bold text-success m-0">12</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Commandes en cours</h6>
                <h3 class="fw-bold text-warning m-0">34</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Total Achats (ce mois)</h6>
                <h3 class="fw-bold text-primary m-0">1.2M DA</h3>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h5 class="m-0">Liste des Fournisseurs</h5>
            <div class="input-group w-25">
                 <input type="text" class="form-control bg-light border-0" placeholder="Rechercher...">
                 <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
            </div>
        </div>
        <div class="table-responsive">
            <table id="fournisseursTable" class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Fournisseur</th>
                        <th>Nom Contact</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <!-- The row data will be dynamically populated, e.g. via DataTables or Blade loop depending on implementation -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const indexFournisseurUrl="{{ route('fournisseurs.index') }}";
</script>
<!-- Include relevant JS if needed -->
 <script src="{{ asset('assets/js/fournisseurs/index.js') }}"> </script> 
@endpush
