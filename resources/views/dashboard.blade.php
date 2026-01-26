@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Tableau de Bord</h2>
            <p class="text-muted m-0">Bienvenue sur votre espace de gestion.</p>
        </div>
        <button class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i> Nouvelle Commande
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="stats-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-icon text-primary bg-primary-subtle" style="background: rgba(67, 97, 238, 0.1);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h6 class="text-muted mb-1 uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">COMMANDES</h6>
                        <h3 class="fw-bold mb-0">1,245</h3>
                    </div>
                    <span class="badge bg-success-subtle text-success">+12%</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="stats-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-icon text-success bg-success-subtle" style="background: rgba(16, 185, 129, 0.1);">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h6 class="text-muted mb-1 uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">REVENU</h6>
                        <h3 class="fw-bold mb-0">45,200 DA</h3>
                    </div>
                    <span class="badge bg-success-subtle text-success">+8.5%</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stats-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-icon text-warning bg-warning-subtle" style="background: rgba(245, 158, 11, 0.1);">
                            <i class="fas fa-users"></i>
                        </div>
                        <h6 class="text-muted mb-1 uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">CLIENTS</h6>
                        <h3 class="fw-bold mb-0">854</h3>
                    </div>
                    <span class="badge bg-danger-subtle text-danger">-2.1%</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stats-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stats-icon text-info bg-info-subtle" style="background: rgba(6, 182, 212, 0.1);">
                            <i class="fas fa-box"></i>
                        </div>
                        <h6 class="text-muted mb-1 uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">PRODUITS</h6>
                        <h3 class="fw-bold mb-0">320</h3>
                    </div>
                    <span class="badge bg-success-subtle text-success">+5%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="table-card">
                <div class="table-header">
                    <h5 class="m-0 fw-bold">Commandes Récentes</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3">Voir Tout</a>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#CMD-001</td>
                                <td class="fw-bold">Ahmed Benali</td>
                                <td>08 Jan 2026</td>
                                <td>15,000 DA</td>
                                <td><span class="status-badge status-success">Payé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#CMD-002</td>
                                <td class="fw-bold">Sarl Tech Solutions</td>
                                <td>07 Jan 2026</td>
                                <td>120,500 DA</td>
                                <td><span class="status-badge status-warning">En attente</span></td>
                                <td>
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#CMD-003</td>
                                <td class="fw-bold">Mourad Khelil</td>
                                <td>06 Jan 2026</td>
                                <td>4,200 DA</td>
                                <td><span class="status-badge status-danger">Annulé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#CMD-004</td>
                                <td class="fw-bold">Entreprise Alpha</td>
                                <td>05 Jan 2026</td>
                                <td>45,000 DA</td>
                                <td><span class="status-badge status-success">Livré</span></td>
                                <td>
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="stats-card h-auto mb-4">
                <h5 class="fw-bold mb-4">Stock Faible</h5>
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-light rounded p-2">
                            <i class="fas fa-laptop text-primary"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 fw-bold">Laptop HP ProBook</h6>
                        <small class="text-danger">Reste: 2 unités</small>
                    </div>
                    <button class="btn btn-sm btn-outline-danger rounded-pill">Commander</button>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-light rounded p-2">
                            <i class="fas fa-print text-primary"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 fw-bold">Imprimante Canon</h6>
                        <small class="text-warning">Reste: 5 unités</small>
                    </div>
                    <button class="btn btn-sm btn-outline-warning rounded-pill">Commander</button>
                </div>
            </div>
            
             <div class="stats-card h-auto bg-primary text-white" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border: none;">
                <h5 class="mb-3 text-white">Besoin d'aide ?</h5>
                <p class="mb-4" style="opacity: 0.9;">Consultez la documentation ou contactez le support technique.</p>
                <button class="btn btn-light text-primary w-100 fw-bold shadow-sm">Centre d'aide</button>
            </div>
        </div>
    </div>
</div>
@endsection
