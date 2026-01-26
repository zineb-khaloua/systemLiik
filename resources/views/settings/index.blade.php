@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Paramètres</h2>
            <p class="text-muted m-0">Gérez les préférences de l'application.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-3">
            <div class="stats-card p-0 overflow-hidden">
                <div class="list-group list-group-flush">
                    <a href="#general" class="list-group-item list-group-item-action active p-3 d-flex align-items-center" data-bs-toggle="list">
                        <i class="fas fa-sliders-h me-3"></i> Général
                    </a>
                    <a href="#notifications" class="list-group-item list-group-item-action p-3 d-flex align-items-center" data-bs-toggle="list">
                        <i class="fas fa-bell me-3"></i> Notifications
                    </a>
                    <a href="#security" class="list-group-item list-group-item-action p-3 d-flex align-items-center" data-bs-toggle="list">
                        <i class="fas fa-shield-alt me-3"></i> Sécurité
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="tab-content">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="general">
                    <div class="stats-card">
                        <h5 class="fw-bold mb-4">Préférences Générales</h5>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Langue de l'interface</label>
                            <select class="form-select">
                                <option value="fr" selected>Français</option>
                                <option value="en">English</option>
                                <option value="ar">العربية</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Thème</label>
                            <div class="d-flex gap-3">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="theme" id="themeLight" checked>
                                    <label class="form-check-label" for="themeLight">
                                        <div class="card p-2 border text-center" style="width: 100px;">
                                            <i class="fas fa-sun text-warning mb-2 h4"></i>
                                            <small>Clair</small>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="theme" id="themeDark">
                                    <label class="form-check-label" for="themeDark">
                                        <div class="card p-2 border text-center" style="width: 100px;">
                                            <i class="fas fa-moon text-primary mb-2 h4"></i>
                                            <small>Sombre</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary-custom">Enregistrer</button>
                        </div>
                    </div>
                </div>

                <!-- Notifications Settings -->
                <div class="tab-pane fade" id="notifications">
                    <div class="stats-card">
                        <h5 class="fw-bold mb-4">Préférences de Notification</h5>
                        
                        <div class="list-group list-group-flush mb-4">
                            <label class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                                <div>
                                    <div class="fw-bold">Notifications par email</div>
                                    <div class="text-muted small">Recevoir des mises à jour importantes par email.</div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                </div>
                            </label>
                            <label class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                                <div>
                                    <div class="fw-bold">Nouvelles commandes</div>
                                    <div class="text-muted small">Être notifié lors de la réception d'une nouvelle commande.</div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                </div>
                            </label>
                            <label class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                                <div>
                                    <div class="fw-bold">Stock faible</div>
                                    <div class="text-muted small">Recevoir une alerte quand le stock est bas.</div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                </div>
                            </label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary-custom">Enregistrer</button>
                        </div>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="tab-pane fade" id="security">
                     <div class="stats-card text-center py-5">
                        <div class="mb-4">
                             <div class="stats-icon text-success bg-success-subtle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5>Gestion de la sécurité</h5>
                            <p class="text-muted">Pour modifier votre mot de passe, veuillez vous rendre sur votre profil.</p>
                        </div>
                        <a href="{{ route('profile.show') }}" class="btn btn-outline-primary rounded-pill px-4">
                            Aller au Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card-radio .form-check-input {
    display: none;
}
.card-radio .form-check-input:checked + .form-check-label .card {
    border-color: var(--primary-color) !important;
    background-color: rgba(67, 97, 238, 0.05);
}
.list-group-item.active {
    background-color: rgba(67, 97, 238, 0.1);
    color: var(--primary-color);
    border-color: transparent;
    font-weight: 600;
}
</style>
@endsection
