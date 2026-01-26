@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Nouvelle Commande</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Commandes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Création</li>
                </ol>
            </nav>
        </div>
        <a href="#" class="btn btn-light border text-dark">
            <i class="fas fa-arrow-left me-2"></i> Annuler
        </a>
    </div>

    <form class="row g-4">
        <!-- Left Column: Order Details -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold m-0">Détails de la commande</h5>
                    <span class="text-muted small">Date: {{ date('d/m/Y') }}</span>
                </div>
                <div class="card-body p-4">
                    <!-- Product Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Ajouter des produits</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Rechercher un produit par nom ou référence...">
                            <button class="btn btn-primary-custom" type="button">Ajouter</button>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 40%">Produit</th>
                                    <th style="width: 15%">Prix Unitaire</th>
                                    <th style="width: 15%">Quantité</th>
                                    <th style="width: 15%">Total HT</th>
                                    <th style="width: 5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Laptop HP ProBook</div>
                                        <small class="text-muted">Ref: HP-450-G8</small>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" value="85000">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" value="1">
                                    </td>
                                    <td class="fw-bold text-end">85,000</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm text-danger"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Souris sans fil Logitech</div>
                                        <small class="text-muted">Ref: LOG-M185</small>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" value="2500">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" value="2">
                                    </td>
                                    <td class="fw-bold text-end">5,000</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm text-danger"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total HT</td>
                                    <td class="text-end fw-bold">90,000 DA</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">TVA (19%)</td>
                                    <td class="text-end fw-bold text-danger">17,100 DA</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold fs-5">Total TTC</td>
                                    <td class="text-end fw-bold fs-5 text-primary">107,100 DA</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Notes pour la commande</label>
                        <textarea class="form-control" rows="2" placeholder="Instructions spéciales..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Client & Settings -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold m-0">Informations Client</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Client <span class="text-danger">*</span></label>
                        <select class="form-select">
                            <option selected disabled>Sélectionner un client...</option>
                            <option value="1">Ahmed Benali (Particulier)</option>
                            <option value="2">Sarl Tech Solutions (Entreprise)</option>
                        </select>
                        <a href="#" class="small text-primary text-decoration-none mt-1 d-inline-block">+ Nouveau Client</a>
                    </div>
                    
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <h6 class="fw-bold mb-2">Adresse de facturation</h6>
                        <p class="text-muted small m-0">
                            12 Rue de la Liberté<br>
                            Oran, 31000<br>
                            Algérie<br>
                            <i class="fas fa-phone me-1"></i> 0555 12 34 56
                        </p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold m-0">Paiement & Livraison</h5>
                </div>
                <div class="card-body p-4">
                     <div class="mb-3">
                        <label class="form-label fw-bold">Mode de paiement</label>
                        <select class="form-select">
                            <option value="cash">Espèces</option>
                            <option value="check">Chèque</option>
                            <option value="transfer">Virement Bancaire</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Statut de la commande</label>
                        <select class="form-select">
                            <option value="pending" selected>En attente</option>
                            <option value="completed">Complétée</option>
                            <option value="cancelled">Annulée</option>
                        </select>
                    </div>
                </div>
            </div>

             <div class="d-grid">
                <button type="submit" class="btn btn-success py-3 fw-bold shadow-sm">
                    <i class="fas fa-check-circle me-2"></i> Valider la commande
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
