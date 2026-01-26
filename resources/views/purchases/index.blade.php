@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Achats & Fournisseurs</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Achats</li>
                </ol>
            </nav>
        </div>
        <div>
             <a href="#" class="btn btn-light border me-2">
                <i class="fas fa-truck me-2"></i> Gérer Fournisseurs
            </a>
            <a href="#" class="btn btn-primary-custom">
                <i class="fas fa-plus me-2"></i> Nouvel Achat
            </a>
        </div>
       
    </div>

    <!-- Suppliers Quick View -->
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="fw-bold mb-3">Fournisseurs Principaux</h5>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center">
                 <div class="avatar bg-primary-subtle text-primary rounded-3 me-3" style="width: 50px; height: 50px; display:flex; align-items:center; justify-content:center;"><i class="fas fa-building"></i></div>
                 <div>
                     <h6 class="fw-bold m-0">Global Tech</h6>
                     <small class="text-muted">Informatique</small>
                 </div>
            </div>
        </div>
         <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center">
                 <div class="avatar bg-warning-subtle text-warning rounded-3 me-3" style="width: 50px; height: 50px; display:flex; align-items:center; justify-content:center;"><i class="fas fa-print"></i></div>
                 <div>
                     <h6 class="fw-bold m-0">Print Solutions</h6>
                     <small class="text-muted">Impression</small>
                 </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center bg-light border-dashed" style="cursor: pointer; border: 2px dashed #e2e8f0;">
                 <div class="w-100 text-center text-muted">
                     <i class="fas fa-plus mb-1"></i><br>Ajouter
                 </div>
            </div>
        </div>
    </div>

    <!-- Purchases Table -->
    <div class="table-card">
         <div class="table-header">
            <h5 class="m-0 fw-bold">Historique des Achats</h5>
        </div>
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>N° Bon</th>
                        <th>Fournisseur</th>
                        <th>Date</th>
                        <th>Montant HT</th>
                        <th>Statut</th>
                        <th>Paiement</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">ACH-2024-051</td>
                        <td>Global Tech Sarl</td>
                        <td>05 Jan 2026</td>
                        <td class="fw-bold">1,500,000 DA</td>
                        <td><span class="status-badge status-success">Réceptionné</span></td>
                        <td><span class="status-badge status-warning">Partiel</span></td>
                         <td class="text-end">
                            <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
