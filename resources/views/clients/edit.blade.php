@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Modifier Client</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" class="text-decoration-none">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
      @csrf
      @method('PUT')
    <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom p-3">
                        <h5 class="fw-bold m-0">Informations du Client</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Nom Complet <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="nom_complet" value="{{ old('nom_complet', $client->nom_complet) }}" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $client->email) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Téléphone <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $client->telephone) }}" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Type de Client <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                   <select name="type" id="type" class="form-control" >
                                    <option value="">Selectionner un type de client</option>
                                    <option value="particulier" {{ old('type', $client->type) == 'particulier' ? 'selected' : '' }}>Particulier</option>
                                    <option value="entreprise" {{ old('type', $client->type) == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                                    <option value="institutionnel" {{ old('type', $client->type) == 'institutionnel' ? 'selected' : '' }}>Institutionnel</option>
                                    <option value="auto-entrepreneur" {{ old('type', $client->type) == 'auto-entrepreneur' ? 'selected' : '' }}>Auto-entrepreneur</option>
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Adresse <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="adresse" rows="3">{{ old('adresse', $client->adresse) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('clients.index') }}" class="btn btn-light btn-lg px-4 text-danger fw-bold">
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary-custom btn-lg px-5 fw-bold text-white shadow-sm">
                        <i class="fas fa-save me-2"></i> Modifier
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
