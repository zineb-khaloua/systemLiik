@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Bon de Commandes</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
                </ol>
            </nav>
        </div>
        <a href="#" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i> Nouvelle Commande
        </a>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Total Commandes</h6>
                <h3 class="fw-bold text-dark m-0">1,250</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">En Attente</h6>
                <h3 class="fw-bold text-warning m-0">45</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Payées</h6>
                <h3 class="fw-bold text-success m-0">850</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                <h6 class="text-muted text-uppercase small fw-bold">Annulées</h6>
                <h3 class="fw-bold text-danger m-0">25</h3>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Cette semaine
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Ce mois</a></li>
                        <li><a class="dropdown-item" href="#">Cette année</a></li>
                    </ul>
                </div>
                 <button class="btn btn-light border"><i class="fas fa-file-export me-2"></i>Exporter</button>
            </div>
            <div class="input-group w-25">
                 <input type="text" class="form-control bg-light border-0" placeholder="Rechercher...">
                 <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Montant HT</th>
                        <th>Montant TTC</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-primary">#CMD-2024-001</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-primary-subtle text-primary me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">MA</div>
                                <div>
                                    <div class="fw-bold">Mohamed Amine</div>
                                    <small class="text-muted">Oran, Algérie</small>
                                </div>
                            </div>
                        </td>
                        <td>08 Jan 2026</td>
                        <td>12,000 DA</td>
                        <td class="fw-bold">14,280 DA</td>
                        <td><span class="status-badge status-success">Payé</span></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-light text-primary" title="Voir"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-light text-secondary" title="Imprimer"><i class="fas fa-print"></i></button>
                            <button class="btn btn-sm btn-light text-danger" title="Supprimer"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                     <tr>
                        <td class="fw-bold text-primary">#CMD-2024-002</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-warning-subtle text-warning me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">ST</div>
                                <div>
                                    <div class="fw-bold">Sofiane Tech</div>
                                    <small class="text-muted">Alger, Algérie</small>
                                </div>
                            </div>
                        </td>
                        <td>07 Jan 2026</td>
                        <td>50,000 DA</td>
                        <td class="fw-bold">59,500 DA</td>
                        <td><span class="status-badge status-warning">En attente</span></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-light text-primary" title="Voir"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-light text-secondary" title="Imprimer"><i class="fas fa-print"></i></button>
                            <button class="btn btn-sm btn-light text-danger" title="Supprimer"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center p-3">
             <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
