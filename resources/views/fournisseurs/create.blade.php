@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Nouveau Fournisseur</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('fournisseurs.index') }}" class="text-decoration-none">Fournisseurs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('fournisseurs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Colonne principale (Informations et coordonnées) -->
            <div class="col-lg-8">
                <!-- Informations Générales -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-building text-primary-custom me-2"></i>Informations Générales</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nom du Fournisseur / Raison Sociale <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nom_fournisseur" placeholder="Ex: Entreprise XYZ" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nom du Contact <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="contact_nom" placeholder="Ex: Ahmed Yassine" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Type de Fournisseur <span class="text-danger">*</span></label>
                                <select name="type_fournisseur" class="form-select" required>
                                    <option value="" disabled selected>Sélectionner le type</option>
                                    <option value="Grossiste">Grossiste</option>
                                    <option value="Fabricant">Fabricant</option>
                                    <option value="Distributeur">Distributeur</option>
                                    <option value="Prestataire de services">Prestataire de services</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Forme Juridique</label>
                                <select name="form_juridique" class="form-select">
                                    <option value="" selected>Sélectionner</option>
                                    <option value="SARL">SARL</option>
                                    <option value="SARL AU">SARL AU</option>
                                    <option value="SA">SA</option>
                                    <option value="SNC">SNC</option>
                                    <option value="Auto-entrepreneur">Auto-entrepreneur</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coordonnées & Adresse -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-map-marker-alt text-primary-custom me-2"></i>Coordonnées & Adresse</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="contact@entreprise.com" required>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Téléphone <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone text-muted"></i></span>
                                    <input type="text" class="form-control" name="telephone" placeholder="06..." required>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Tél Secondaire</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone-alt text-muted"></i></span>
                                    <input type="text" class="form-control" name="telephone_secondaire" placeholder="05...">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Adresse <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="adresse" rows="2" placeholder="Adresse complète" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Ville</label>
                                <input type="text" class="form-control" name="ville" placeholder="Ex: Casablanca">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" placeholder="Ex: 20000">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pays</label>
                                <input type="text" class="form-control" name="pays" value="Maroc" placeholder="Ex: Maroc">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations Financières & Paiement -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-money-check-alt text-primary-custom me-2"></i>Informations Financières & Commerciales</h5>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="text-primary fw-bold mb-3">Conditions commerciales</h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Mode de paiement</label>
                                <select name="mode_paiement" class="form-select">
                                    <option value="" selected>Sélectionner</option>
                                    <option value="Virement">Virement</option>
                                    <option value="Chèque">Chèque</option>
                                    <option value="Espèces">Espèces</option>
                                    <option value="Effet">Effet (Traite)</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Délai de paiement (Jours)</label>
                                <input type="number" class="form-control" name="delai_paiement" placeholder="Ex: 30" min="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Délai de livraison (Jours)</label>
                                <input type="number" class="form-control" name="delai_livraison" placeholder="Ex: 7" min="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Conditions de paiement</label>
                                <input type="text" class="form-control" name="conditions_paiement" placeholder="Ex: 50% à la commande, 50% à la livraison">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Date expiration de contrat</label>
                                <input type="date" class="form-control" name="date_expiration_contrat">
                            </div>
                        </div>

                        <hr class="my-4">
                        <h6 class="text-primary fw-bold mb-3">Coordonnées bancaires</h6>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Banque</label>
                                <input type="text" class="form-control" name="banque" placeholder="Ex: Attijariwafa Bank">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">RIB / Numéro de compte</label>
                                <input type="text" class="form-control" name="rib" placeholder="24 chiffres" maxlength="24">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">IBAN</label>
                            <input type="text" class="form-control" name="iban" placeholder="MA...">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne latérale (Informations légales & Options) -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-balance-scale text-primary-custom me-2"></i>Informations Légales</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">I.C.E (Identifiant Commun de l'Entreprise)</label>
                            <input type="text" class="form-control" name="ice" placeholder="15 chiffres">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">I.F (Identifiant Fiscal)</label>
                            <input type="text" class="form-control" name="if">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">R.C (Registre du Commerce)</label>
                            <input type="text" class="form-control" name="rc">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Patente</label>
                            <input type="text" class="form-control" name="patente">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">N° CNSS</label>
                            <input type="text" class="form-control" name="cnss">
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-cog text-primary-custom me-2"></i>Autres Informations</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Statut</label>
                            <select name="statut" class="form-select bg-light">
                                <option value="actif" selected>Actif</option>
                                <option value="inactif">Inactif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Notes / Observations</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Informations supplémentaires..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Documents attachés</label>
                            <input type="file" class="form-control" name="documents">
                            <small class="text-muted">Ex: Kbis, RIB, Plaquette...</small>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="d-grid gap-3 mb-4">
                    <button type="submit" class="btn btn-primary-custom btn-lg fw-bold text-white shadow-sm" style="background-color: #0d6efd; color: white;">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                    <a href="{{ route('fournisseurs.index') }}" class="btn btn-light btn-lg text-danger fw-bold shadow-sm">
                        <i class="fas fa-times me-2"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
