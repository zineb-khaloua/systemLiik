@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Gestion des Clients</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('clients.create') }}" class="btn btn-primary-custom btn-lg">
            <i class="fas fa-user-plus me-2"></i> Nouveau Client
        </a>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
         <div class="col-md-2">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Total Clients</h6>
                <h3 class="fw-bold text-dark m-0">854</h3>
            </div>
        </div>
         <div class="col-md-2">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Entreprises</h6>
                <h3 class="fw-bold text-primary m-0">120</h3>
            </div>
        </div>
         <div class="col-md-2">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Particuliers</h6>
                <h3 class="fw-bold text-info m-0">734</h3>
            </div>
        </div>
         <div class="col-md-2">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Auto-entrepreneur</h6>
                <h3 class="fw-bold text-warning m-0">0</h3>
            </div>
        </div>
         <div class="col-md-2">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Institutionnel</h6>
                <h3 class="fw-bold text-danger m-0">0</h3>
            </div>
        </div>
         <div class="col-md-2">
             <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                 <h6 class="text-muted text-uppercase small fw-bold">Actifs ce mois</h6>
                 <h3 class="fw-bold text-success m-0">45</h3>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            
            <h5 class="m-0">Liste des Clients</h5>
        </div>
        <div class="table-responsive">
            <table id="clientsTable" class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Type Client</th>
                        <th>Commandes</th>
                        <th>Chiffre d'affaire</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const indexClientUrl="{{route('clients.index')}}";
</script>
<script src="{{ asset('assets/js/clients/index.js') }}"> </script>
@endpush
