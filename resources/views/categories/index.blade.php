@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Catégories</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Catégories</li>
                </ol>
            </nav>
        </div>
        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-2"></i> Nouvelle Catégorie
        </button>
    </div>

    <div class="row g-4">
        <!-- Category List -->
        <div class="col-lg-8">
            <div class="table-card">
                <div class="table-header">
                    <h5 class="fw-bold m-0">Liste des catégories</h5>
                    <div class="input-group w-50">
                         <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
                         <input type="text" class="form-control bg-light border-0" placeholder="Rechercher...">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Produits</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">
                                    <i class="fas fa-laptop me-2 text-primary"></i> Électronique
                                </td>
                                <td class="text-muted text-truncate" style="max-width: 200px;">Ordinateurs, Téléphones et accessoires</td>
                                <td><span class="badge bg-secondary rounded-pill">124</span></td>
                                <td><span class="status-badge status-success">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">
                                    <i class="fas fa-print me-2 text-success"></i> Bureautique
                                </td>
                                <td class="text-muted text-truncate" style="max-width: 200px;">Imprimantes, Scanners et matériel de bureau</td>
                                <td><span class="badge bg-secondary rounded-pill">45</span></td>
                                <td><span class="status-badge status-success">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">
                                    <i class="fas fa-box-open me-2 text-warning"></i> Consommables
                                </td>
                                <td class="text-muted text-truncate" style="max-width: 200px;">Papier, Encre, Stylos</td>
                                <td><span class="badge bg-secondary rounded-pill">312</span></td>
                                <td><span class="status-badge status-warning">Caché</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Stat Card -->
        <div class="col-lg-4">
            <div class="stats-card bg-primary text-white mb-4" style="background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%); border: none;">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="fas fa-layer-group fa-2x text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white text-opacity-75 mb-1">TOTAL CATÉGORIES</h6>
                        <h1 class="fw-bold m-0">8</h1>
                    </div>
                </div>
                <p class="text-white text-opacity-75">Organisez vos produits efficacement pour améliorer l'expérience client et la gestion des stocks.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Top Catégories (Ventes)</h6>
                    <div class="d-flex align-items-center mb-3">
                        <span class="fw-bold me-auto">1. Électronique</span>
                        <span class="badge bg-success-subtle text-success">45%</span>
                    </div>
                    <div class="progress mb-4" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 45%"></div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <span class="fw-bold me-auto">2. Bureautique</span>
                        <span class="badge bg-primary-subtle text-primary">30%</span>
                    </div>
                    <div class="progress mb-4" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%"></div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <span class="fw-bold me-auto">3. Autres</span>
                        <span class="badge bg-secondary-subtle text-secondary">25%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom-0 p-4 pb-0">
                <h5 class="modal-title fw-bold">Nouvelle Catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom de la catégorie</label>
                        <input type="text" class="form-control" placeholder="Ex: Informatique">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="categoryActive" checked>
                        <label class="form-check-label" for="categoryActive">Catégorie active</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0 p-4 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary-custom px-4">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
@endsection
