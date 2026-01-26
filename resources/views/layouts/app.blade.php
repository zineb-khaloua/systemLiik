<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SystemLiik') }} - Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #4cc9f0;
            --dark-bg: #0f172a;
            --sidebar-bg: #ffffff;
            --card-bg: #ffffff;
            --text-main: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            color: var(--text-main);
            overflow-x: hidden;
            font-size: 0.95rem; /* Back to normal/small size for content */
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* Sidebar Styles - KEEPING HUGE */
        .sidebar {
            width: 340px; 
            height: 100vh;
            background: var(--sidebar-bg);
            color: var(--text-main);
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0,0,0,0.05);
            border-right: 1px solid var(--border-color);
        }

        .sidebar-header {
            padding: 2.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .brand-logo {
            font-size: 2rem; 
            font-weight: 900;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-logo i {
            color: var(--secondary-color);
        }

        .sidebar-menu {
            padding: 2rem 1.5rem;
            overflow-y: auto;
            height: calc(100vh - 100px);
        }
        
        /* Scrollbar for Sidebar */
        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.1);
            border-radius: 4px;
        }

        .menu-header {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            margin: 2rem 0 1rem 1rem;
            font-weight: 800;
        }

        .nav-link {
            color: var(--text-main);
            padding: 1.2rem 1.5rem; 
            border-radius: 16px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 18px;
            transition: all 0.2s;
            font-weight: 700;
            font-size: 1.15rem; /* Kept large */
        }

        .nav-link:hover {
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.05);
            transform: translateX(8px);
        }

        .nav-link.active {
            background: var(--primary-color);
            color: #fff;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
        }

        .nav-link i {
            width: 32px;
            text-align: center;
            font-size: 1.4rem; /* Kept large */
        }

        /* Main Content */
        .main-content {
            margin-left: 340px; 
            padding: 2rem; /* Reduced padding */
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* Navbar - KEEPING HUGE */
        .top-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 1.5rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid white;
        }

        .search-bar input {
            background: #f1f5f9;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            width: 400px;
            color: var(--text-main);
            font-size: 1.1rem;
        }
        
        .search-bar input:focus {
            background: #fff;
            box-shadow: 0 0 0 3px var(--primary-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
        }

        .avatar {
            width: 50px; 
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
            font-size: 1.2rem;
        }

        /* Cards - Back to normal */
        .stats-card {
            background: #fff;
            border-radius: 20px; /* Bit smaller radius */
            padding: 1.5rem;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        }

        .stats-icon {
            width: 50px; /* Reduced from 70px */
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .table-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-table th {
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 0.8rem; /* Smaller headers */
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background: #f8fafc;
        }

        .custom-table td {
            padding: 1rem 1.5rem;
            color: var(--text-main);
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem; /* Smaller cell text */
        }
        
        .btn-custom {
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .btn-primary-custom {
            background: var(--primary-color);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary-custom:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }

        .status-badge {
            padding: 0.25rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }
        
        .status-success { background: rgba(16, 185, 129, 0.1); color: #10b981; }
        .status-warning { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .status-danger { background: rgba(2ef, 68, 68, 0.1); color: #ef4444; }

        /* Custom Breadcrumb */
        .breadcrumb {
            background: #fff;
            padding: 1rem 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            border: 1px solid rgba(226, 232, 240, 0.6);
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .breadcrumb-item a:hover {
            color: var(--secondary-color);
            transform: translateY(-1px);
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            font-family: "Font Awesome 6 Free";
            content: "\f054"; /* fa-chevron-right */
            font-weight: 900;
            font-size: 0.8rem;
            color: var(--text-muted);
            opacity: 0.5;
            padding: 0 12px;
        }

    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        @include('partials.navbar')
        
        <!-- Page Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        
        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    @stack('scripts')
</body>
</html>
