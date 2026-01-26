<div class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="brand-logo">
            <i class="fas fa-cube"></i>
            SystemLiik
        </a>
    </div>
    
    <div class="sidebar-menu">
        <a href="{{ route('dashboard') }}" class="nav-link active">
            <i class="fas fa-chart-line"></i>
            <span>Dashboard</span>
        </a>

        <div class="menu-header">Commercial</div>
        <a href="{{ route('clients.index') }}" class="nav-link">
            <i class="fas fa-user-tie"></i>
            <span>Clients</span>
        </a>
        <a href="{{ route('orders.index') }}" class="nav-link">
            <i class="fas fa-shopping-cart"></i>
            <span>Bon de Commandes</span>
        </a>
        <a href="{{ route('quotes.index') }}" class="nav-link">
            <i class="fas fa-file-invoice"></i>
            <span>Devis</span>
        </a>
        <a href="{{ route('invoices.index') }}" class="nav-link">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>Factures</span>
        </a>

        <div class="menu-header">Gestion Produits</div>
        <a href="{{ route('products.index') }}" class="nav-link">
            <i class="fas fa-box-open"></i>
            <span>Produits</span>
        </a>
        <a href="{{ route('categories.index') }}" class="nav-link">
            <i class="fas fa-tags"></i>
            <span>Catégories</span>
        </a>

        <div class="menu-header">Achats & Stock</div>
        <a href="{{ route('purchases.index') }}" class="nav-link">
            <i class="fas fa-shopping-bag"></i>
            <span>Achats</span>
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-truck"></i>
            <span>Fournisseurs</span>
        </a>
  @can('viewAny',App\Models\User::class)
        <div class="menu-header">Administration</div>
        
        <a href="{{ route('users.index') }}" class="nav-link">
            <i class="fas fa-users"></i>
            <span>Utilisateurs</span>
        </a>
      
       
        <a href="{{ route('roles.index') }}" class="nav-link">
            <i class="fas fa-user-shield"></i>
            <span>Rôles</span>
        </a>
        <a href="{{ route('permissions.index') }}" class="nav-link">
            <i class="fas fa-key"></i>
            <span>Permissions</span>
        </a>
       @endcan
    </div> 
    

</div>

