@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Factures</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Factures</li>
                </ol>
            </nav>
        </div>
         <a href="#" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i> Créer Facture
        </a>
    </div>

    <div class="table-card">
         <div class="table-header">
            <div class="d-flex gap-2">
                 <button class="btn btn-light border"><i class="fas fa-filter me-2"></i>Filtrer</button>
                 <button class="btn btn-light border"><i class="fas fa-download me-2"></i>Export Excel</button>
            </div>
            <div class="input-group w-25">
                 <input type="text" class="form-control bg-light border-0" placeholder="Recherche facture...">
                 <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>N° Facture</th>
                        <th>Client</th>
                        <th>Date Émission</th>
                        <th>Date Échéance</th>
                        <th>Montant</th>
                        <th>Reste à Payer</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-dark">FAC-2024-089</td>
                        <td>
                             <div class="d-flex align-items-center">
                                <div class="avatar bg-primary text-white me-2 rounded-circle" style="width: 30px; height: 30px; font-size: 0.8rem;">ET</div>
                                <span class="fw-bold">Ets Toufik & Frères</span>
                            </div>
                        </td>
                        <td>01 Jan 2026</td>
                        <td>31 Jan 2026</td>
                        <td class="fw-bold">120,000 DA</td>
                        <td class="text-danger fw-bold">120,000 DA</td>
                        <td><span class="status-badge status-danger">Non Payée</span></td>
                         <td class="text-end">
                            <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-light text-success"><i class="fas fa-envelope"></i></button>
                            <button class="btn btn-sm btn-light text-dark"><i class="fas fa-download"></i></button>
                        </td>
                    </tr>
                     <tr>
                        <td class="fw-bold text-dark">FAC-2024-088</td>
                        <td>
                             <div class="d-flex align-items-center">
                                <div class="avatar bg-info text-white me-2 rounded-circle" style="width: 30px; height: 30px; font-size: 0.8rem;">MA</div>
                                <span class="fw-bold">Mourad Agency</span>
                            </div>
                        </td>
                        <td>28 Dec 2025</td>
                        <td>28 Jan 2026</td>
                        <td class="fw-bold">45,000 DA</td>
                        <td class="text-success fw-bold">0 DA</td>
                        <td><span class="status-badge status-success">Payée</span></td>
                         <td class="text-end">
                            <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-light text-success"><i class="fas fa-envelope"></i></button>
                            <button class="btn btn-sm btn-light text-dark"><i class="fas fa-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
