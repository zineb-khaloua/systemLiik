@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Gestion des Clients</h2>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('clients.create') }}" class="btn btn-primary-custom btn-lg">
            <i class="fas fa-user-plus me-2"></i> Nouveau Client
        </a>
    </div>

    <div class="row g-4 mb-5">
         <div class="col-md-3">
            <div class="stats-card bg-primary text-white" style="background: linear-gradient(135deg, #4361ee, #3f37c9); border: none;">
                <h6 class="text-white-50 text-uppercase fw-bold mb-3">Total Clients</h6>
                <div class="d-flex align-items-end justify-content-between">
                    <h1 class="fw-bold m-0 display-4">854</h1>
                    <span class="badge bg-white text-primary rounded-pill py-2 px-3">+12%</span>
                </div>
            </div>
        </div>
         <div class="col-md-3">
            <div class="stats-card">
                <h6 class="text-muted text-uppercase fw-bold mb-3">Entreprises</h6>
                <div class="d-flex align-items-end justify-content-between">
                    <h1 class="fw-bold m-0 display-4 text-dark">120</h1>
                    <i class="fas fa-building fa-2x text-muted opacity-25"></i>
                </div>
            </div>
        </div>
         <div class="col-md-3">
            <div class="stats-card">
                 <h6 class="text-muted text-uppercase fw-bold mb-3">Particuliers</h6>
                <div class="d-flex align-items-end justify-content-between">
                    <h1 class="fw-bold m-0 display-4 text-dark">734</h1>
                    <i class="fas fa-user fa-2x text-muted opacity-25"></i>
                </div>
            </div>
        </div>
         <div class="col-md-3">
             <div class="stats-card">
                 <h6 class="text-muted text-uppercase fw-bold mb-3">Actifs ce mois</h6>
                <div class="d-flex align-items-end justify-content-between">
                    <h1 class="fw-bold m-0 display-4 text-success">45</h1>
                    <i class="fas fa-chart-line fa-2x text-success opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <div class="d-flex gap-3">
                <div class="dropdown">
                    <button class="btn btn-light btn-lg border dropdown-toggle fw-bold text-muted" type="button" data-bs-toggle="dropdown">
                        Tous les statuts
                    </button>
                </div>
            </div>
            <div class="input-group w-50">
                 <span class="input-group-text bg-light border-0 ps-4"><i class="fas fa-search fa-lg text-muted"></i></span>
                 <input type="text" class="form-control bg-light border-0 py-3" placeholder="Rechercher par nom, email, téléphone...">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table custom-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Contact</th>
                        <th>Ville</th>
                        <th>Commandes</th>
                        <th>Chiffre d'affaire</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-primary text-white me-4 rounded-circle" style="width: 50px; height: 50px; font-size: 1.2rem;">AB</div>
                                <div>
                                    <div class="fw-bold text-dark fs-5">Ahmed Benali</div>
                                    <span class="badge bg-light text-primary border">Particulier</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="mb-1"><i class="fas fa-envelope text-muted me-2"></i> ahmed.benali@gmail.com</span>
                                <span><i class="fas fa-phone text-muted me-2"></i> 0550 12 34 56</span>
                            </div>
                        </td>
                        <td class="fw-bold text-muted">Oran</td>
                        <td class="fw-bold text-center fs-5">12</td>
                        <td class="fw-bold text-success fs-5">145,000 DA</td>
                        <td><span class="status-badge status-success">Actif</span></td>
                        <td class="text-end">
                            <button class="btn btn-light btn-lg text-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-light btn-lg text-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-info text-white me-4 rounded-circle" style="width: 50px; height: 50px; font-size: 1.2rem;">TC</div>
                                <div>
                                    <div class="fw-bold text-dark fs-5">Techno Corp</div>
                                    <span class="badge bg-light text-info border">Entreprise</span>
                                </div>
                            </div>
                        </td>
                         <td>
                            <div class="d-flex flex-column">
                                <span class="mb-1"><i class="fas fa-envelope text-muted me-2"></i> contact@technocorp.dz</span>
                                <span><i class="fas fa-phone text-muted me-2"></i> 021 45 88 99</span>
                            </div>
                        </td>
                        <td class="fw-bold text-muted">Alger</td>
                        <td class="fw-bold text-center fs-5">45</td>
                        <td class="fw-bold text-success fs-5">2,500,000 DA</td>
                        <td><span class="status-badge status-success">VIP</span></td>
                        <td class="text-end">
                            <button class="btn btn-light btn-lg text-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-light btn-lg text-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-secondary text-white me-4 rounded-circle" style="width: 50px; height: 50px; font-size: 1.2rem;">SK</div>
                                <div>
                                    <div class="fw-bold text-dark fs-5">Sarah Khalil</div>
                                    <span class="badge bg-light text-secondary border">Particulier</span>
                                </div>
                            </div>
                        </td>
                         <td>
                            <div class="d-flex flex-column">
                                <span class="mb-1"><i class="fas fa-envelope text-muted me-2"></i> sarah.k@hotmail.fr</span>
                                <span><i class="fas fa-phone text-muted me-2"></i> 0661 22 33 44</span>
                            </div>
                        </td>
                        <td class="fw-bold text-muted">Sétif</td>
                        <td class="fw-bold text-center fs-5">1</td>
                        <td class="fw-bold text-success fs-5">5,000 DA</td>
                        <td><span class="status-badge status-warning">Nouveau</span></td>
                        <td class="text-end">
                            <button class="btn btn-light btn-lg text-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-light btn-lg text-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
