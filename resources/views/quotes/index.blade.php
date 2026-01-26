@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Devis</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Devis</li>
                </ol>
            </nav>
        </div>
         <a href="#" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i> Créer Devis
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="row text-center">
                <div class="col-md-4 border-end">
                    <h6 class="text-muted text-uppercase small">Total Devis</h6>
                    <h3 class="fw-bold">45</h3>
                </div>
                 <div class="col-md-4 border-end">
                    <h6 class="text-muted text-uppercase small">Acceptés</h6>
                    <h3 class="fw-bold text-success">12</h3>
                </div>
                 <div class="col-md-4">
                    <h6 class="text-muted text-uppercase small">Taux de conversion</h6>
                    <h3 class="fw-bold text-primary">26%</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Prospect / Client</th>
                        <th>Date</th>
                        <th>Validité</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-dark">DEV-2024-012</td>
                        <td><span class="fw-bold">Restaurant Le Gourmet</span></td>
                        <td>08 Jan 2026</td>
                        <td>15 Jours</td>
                        <td class="fw-bold">350,000 DA</td>
                        <td><span class="status-badge status-warning">Envoyé</span></td>
                         <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-check me-2 text-success"></i> Marquer Accepté</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-invoice me-2 text-primary"></i> Convertir en Facture</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> Voir</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Supprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                     <tr>
                        <td class="fw-bold text-dark">DEV-2024-011</td>
                        <td><span class="fw-bold">Ecole Privée Avicenne</span></td>
                        <td>02 Jan 2026</td>
                        <td>30 Jours</td>
                        <td class="fw-bold">1,200,000 DA</td>
                        <td><span class="status-badge status-success">Accepté</span></td>
                         <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-invoice me-2 text-primary"></i> Convertir en Facture</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> Voir</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
