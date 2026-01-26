@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Mon Profil</h2>
            <p class="text-muted m-0">Gérez vos informations personnelles et votre sécurité.</p>
        </div>
    </div>

    @if (session('status') == 'profile-information-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> Informations de profil mises à jour avec succès.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('status') == 'password-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> Mot de passe mis à jour avec succès.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Profile Information -->
        <div class="col-lg-6">
            <div class="stats-card h-100">
                <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                    <div class="stats-icon text-primary bg-primary-subtle me-3" style="background: rgba(67, 97, 238, 0.1);">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h5 class="fw-bold m-0">Informations Personnelles</h5>
                </div>

                <form method="POST" action="{{ route('user-profile-information.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold small text-uppercase text-muted">Nom Complet</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name', 'updateProfileInformation') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus autocomplete="name">
                        </div>
                        @error('name', 'updateProfileInformation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold small text-uppercase text-muted">Adresse Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email', 'updateProfileInformation') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autocomplete="email">
                        </div>
                         @error('email', 'updateProfileInformation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-custom px-4">
                            <i class="fas fa-save me-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-lg-6">
            <div class="stats-card h-100">
                <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                    <div class="stats-icon text-success bg-success-subtle me-3" style="background: rgba(16, 185, 129, 0.1);">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h5 class="fw-bold m-0">Sécurité</h5>
                </div>

                <form method="POST" action="{{ route('user-password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-bold small text-uppercase text-muted">Mot de passe actuel</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-muted"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0 @error('current_password', 'updatePassword') is-invalid @enderror" id="current_password" name="current_password" required autocomplete="current-password">
                        </div>
                        @error('current_password', 'updatePassword')
                             <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold small text-uppercase text-muted">Nouveau mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0 @error('password', 'updatePassword') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                        </div>
                        @error('password', 'updatePassword')
                             <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold small text-uppercase text-muted">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-check-circle text-muted"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success text-white px-4">
                            <i class="fas fa-shield-alt me-2"></i> Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
