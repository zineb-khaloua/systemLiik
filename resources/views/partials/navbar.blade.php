<div class="top-navbar">
    <div class="d-flex align-items-center">
        <i class="fas fa-bars d-lg-none me-3" style="font-size: 1.2rem; cursor: pointer;"></i>
        <div class="search-bar">
            <form action="#">
                <input type="text" placeholder="Rechercher...">
            </form>
        </div>
    </div>
    
    <div class="d-flex align-items-center gap-4">
        <div class="notifications position-relative" style="cursor: pointer">
            <i class="far fa-bell" style="font-size: 1.2rem; color: #64748b;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; padding: 0.2rem 0.4rem;">3</span>
        </div>
        
        <div class="dropdown">
            <div class="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-end d-none d-md-block">
                    <div style="font-weight: 600; font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.75rem; color: #94a3b8;">Administrateur</div>
                </div>
                <div class="avatar">
                    AU
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-2" style="border-radius: 12px; margin-top: 10px;">
                <li><a class="dropdown-item p-2 rounded" href="{{ route('profile.show') }}"><i class="fas fa-user-circle me-2 text-muted"></i> Profil</a></li>
                <li><a class="dropdown-item p-2 rounded" href="{{ route('settings.index') }}"><i class="fas fa-cog me-2 text-muted"></i> Paramètres</a></li>
               
                <li>
                    <a class="dropdown-item p-2 rounded text-danger"  href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                    </a>

                    <form class="d-none" method="POST" id="logout-form" action="{{route('logout')}}">
                        @csrf
                    </form>


                </li>


            </ul>
        </div>
    </div>
</div>
