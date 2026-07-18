@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Catégories</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
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
                </div>
                <div class="table-responsive p-3">
                    <table id="categoriesTable" class="table custom-table mb-0 align-middle w-100">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic Data -->
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
                        <h1 class="fw-bold m-0">{{ \App\Models\Categorie::count() }}</h1>
                    </div>
                </div>
                <p class="text-white text-opacity-75">Organisez vos produits efficacement pour améliorer l'expérience client et la gestion des stocks.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Statistiques Produits</h6>
                    <p class="text-muted small">Nombre total de produits par catégorie pour une meilleure visibilité de votre inventaire.</p>
                    <hr>
                    <div id="categoryStatsSummary">
                        @foreach(\App\Models\Categorie::withCount('produits')->get() as $cat)
                        <div class="d-flex align-items-center mb-2">
                            <span class="small me-auto">{{ $cat->nom_categorie }}</span>
                            <span class="badge bg-primary-subtle text-primary">{{ $cat->produits_count }}</span>
                        </div>
                        @endforeach
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
            <form id="addCategoryForm">
                @csrf
                <div class="modal-header border-bottom-0 p-4 pb-0">
                    <h5 class="modal-title fw-bold">Nouvelle Catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom de la catégorie <span class="text-danger">*</span></label>
                        <input type="text" name="nom_categorie" class="form-control" placeholder="Ex: Informatique" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Description de la catégorie..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary-custom px-4">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form id="editCategoryForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_category_id">
                <div class="modal-header border-bottom-0 p-4 pb-0">
                    <h5 class="modal-title fw-bold">Modifier la Catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom de la catégorie <span class="text-danger">*</span></label>
                        <input type="text" name="nom_categorie" id="edit_nom_categorie" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary-custom px-4">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const indexCategoryUrl = "{{ route('categories.index') }}";
</script>
<script src="{{ asset('assets/js/categories/index.js') }}"></script>
@endpush
