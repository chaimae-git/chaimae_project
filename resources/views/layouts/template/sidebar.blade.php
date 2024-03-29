<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://etafat.ma/en/" class="brand-link">
        <span class="brand-text font-weight-light text-center">ETAFAT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img @if(Auth::guard('utilisateur')->check()) src="{{asset('images/utilisateurs/'.Auth::guard('utilisateur')->user()->image)}}" @else src="{{asset('dist/img/user2-160x160.jpg')}}" @endif class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">@if(Auth::guard('utilisateur')->check()){{Auth::guard('utilisateur')->user()->nom_prenom}}@else {{Auth::guard('web')->user()->name}} @endif</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(\Illuminate\Support\Facades\Auth::guard('utilisateur')->check())
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <p>
                            Tableau de Bord
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('aos.consulter')}}" class="nav-link">
                        <i class="fas fa-blender-phone"></i>
                        <p>
                            Appels d'offres
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database"></i>
                        <p>
                            Données
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bus.consulter')}}" class="nav-link">
                                <i class="fas fa-business-time"></i>
                                <p>Business Units</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('departements.consulter')}}" class="nav-link">
                                <i class="far fa-building"></i>
                                <p>Départements</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="nav-header">PARAMETRAGE</li>
                <li class="nav-item">
                    <a href=@if(\Illuminate\Support\Facades\Auth::guard('utilisateur')->check()) "{{route('utilisateurs.consulter')}}" @else "{{route('admins.utilisateurs.consulter')}}" @endif class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <p>Gestion des utilisateurs</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
