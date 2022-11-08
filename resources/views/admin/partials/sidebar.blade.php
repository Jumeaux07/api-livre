<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div>
                    <img src="{{asset('assets/images/users/2.jpg')}}" alt="user-img" class="img-circle">
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">{{Auth::guard('admin')->user()->nom}}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{route('profilAdmin')}}" class="dropdown-item">
                            <i class="ti-user"></i> Mon Profil</a>
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="{{ url('/admin/logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                     <i class="fa fa-power-off text-danger"></i>
                                        <span>Deconnexion</span>
                            </a>
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap"><h3> ------MENU-----</h3></li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Utilisateurs</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{route('users.index')}}">Liste des utilisateurs </a>
                        </li>
                        <li>
                            <a href="{{route('users.create')}}">Ajouter un utlisateur</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu">Matieres</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{route('matieres.index')}}">Liste des matieres </a>
                        </li>
                        <li>
                            <a href="{{route('matieres.create')}}">Ajouter une matiere</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" aria-expanded="false" href="{{ url('/admin/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="far fa-circle text-danger"></i>
                                <span>Deconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false">
                        <i class="far fa-circle text-info"></i>
                        <span class="hide-menu">FAQs</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
