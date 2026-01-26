@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Gestion des Produits</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                </ol>
            </nav>
        </div>
        <a href="#" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i> Nouveau Produit
        </a>
    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Rechercher un produit...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0">
                        <option selected>Toutes les catégories</option>
                        <option value="1">Électronique</option>
                        <option value="2">Bureautique</option>
                        <option value="3">Consommables</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0">
                        <option selected>Statut</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="out_of_stock">Rupture de stock</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark w-100"><i class="fas fa-filter me-2"></i> Filtrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="table-card">
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th style="width: 50px;">
                            <input type="checkbox" class="form-check-input">
                        </th>
                        <th>Produit</th>
                        <th>Catégorie</th>
                        <th>Prix Achat</th>
                        <th>Prix Vente</th>
                        <th>Stock</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-laptop fa-lg text-secondary"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Laptop Dell Inspiron</div>
                                    <small class="text-muted">Réf: PRD-001</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Électronique</span></td>
                        <td>85,000 DA</td>
                        <td class="fw-bold text-primary">105,000 DA</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height: 5px; width: 50px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                </div>
                                <span class="small text-muted">45</span>
                            </div>
                        </td>
                        <td><span class="status-badge status-success">Actif</span></td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-primary"></i> Modifier</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2 text-info"></i> Fiche technique</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Supprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- Item 2 -->
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-print fa-lg text-secondary"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Imprimante Canon Pixma</div>
                                    <small class="text-muted">Réf: PRD-023</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Bureautique</span></td>
                        <td>22,000 DA</td>
                        <td class="fw-bold text-primary">28,500 DA</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height: 5px; width: 50px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"></div>
                                </div>
                                <span class="small text-muted">3</span>
                            </div>
                        </td>
                        <td><span class="status-badge status-warning">Stock Bas</span></td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-primary"></i> Modifier</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2 text-info"></i> Fiche technique</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Supprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                     <!-- Item 3 -->
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-paperclip fa-lg text-secondary"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Papier A4 (Rame)</div>
                                    <small class="text-muted">Réf: PRD-102</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Consommables</span></td>
                        <td>650 DA</td>
                        <td class="fw-bold text-primary">850 DA</td>
                        <td>
                             <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height: 5px; width: 50px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
                                </div>
                                <span class="small text-muted">0</span>
                            </div>
                        </td>
                        <td><span class="status-badge status-danger">Rupture Stock</span></td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-primary"></i> Modifier</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Supprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
            <span class="text-muted small">Affichage 1-10 de 52 produits</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
