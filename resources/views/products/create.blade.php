@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Nouveau Produit</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                </ol>
            </nav>
        </div>
        <a href="#" class="btn btn-light border text-dark">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>

    <form action="#" method="POST">
        <div class="row g-4">
            <!-- Left Column: Basic Info & Pricing -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0">Informations Générales</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom du produit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ex: Laptop Asus ZenBook">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Référence (SKU)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" class="form-control" placeholder="PRD-XXXX">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Catégorie <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option selected disabled>Choisir une catégorie...</option>
                                    <option>Électronique</option>
                                    <option>Bureautique</option>
                                    <option>Services</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" rows="4" placeholder="Description détaillée du produit..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0">Tarification & Stock</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Prix d'Achat</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0.00">
                                    <span class="input-group-text">DA</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Prix de Vente <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0.00">
                                    <span class="input-group-text">DA</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">TVA (%)</label>
                                <select class="form-select">
                                    <option value="19" selected>19%</option>
                                    <option value="9">9%</option>
                                    <option value="0">0%</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label fw-bold">Stock Initial</label>
                                <input type="number" class="form-control" placeholder="0">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label fw-bold">Seuil d'alerte</label>
                                <input type="number" class="form-control" placeholder="5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Media & Organization -->
            <div class="col-lg-4">
                 <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0">Image du produit</h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="border rounded-4 dashed-border p-5 mb-3" style="border: 2px dashed #e2e8f0; background: #f8fafc;">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <p class="text-muted m-0">Glissez une image ici ou cliquez pour télécharger.</p>
                        </div>
                        <button type="button" class="btn btn-outline-primary w-100">Parcourir les fichiers</button>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0">Options</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Produit Actif</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="trackStock" checked>
                            <label class="form-check-label" for="trackStock">Gérer le stock</label>
                        </div>
                         <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="allowBackorders">
                            <label class="form-check-label" for="allowBackorders">Autoriser les précommandes</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success p-3 fw-bold text-white rounded-3 shadow-sm">
                        <i class="fas fa-save me-2"></i> Enregistrer le produit
                    </button>
                    <button type="button" class="btn btn-light p-2 text-danger">Annuler</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
