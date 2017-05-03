<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('front.index') }}" data-toggle="tooltip" data-placement="bottom" title="Pagina principal">_Proyecto</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->


                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" data-toggle="tooltip" data-placement="bottom" title="Conectate ahora!">Inicio de Sesion</a></li>
                        <li><a href="{{ url('/register') }}" data-toggle="tooltip" data-placement="bottom" title="Registrate!">Registrar</a></li>
                    @else @if(Auth::user())

                    <li><a href="{{ route('admin.comments.create') }}" data-toggle="tooltip" data-placement="bottom" title="Nuevos comentarios">Crear Comentarios</a></li>

                    <li><a href="{{ route('admin.articles.create') }}" data-toggle="tooltip" data-placement="bottom" title="Nuevo articulo">Crear Articulo</a></li>
                    

                        

                                @if(Auth::user()->admin())
                                <li class="dropdown" data-toggle="tooltip" data-placement="left" title="Panel administrativo">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-cog"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.images.index') }}">Ver Articulos</a></li>
                                <li><a href="{{ route('admin.articles.index') }}">Gestionar Articulos</a></li>
                                <li><a href="{{ route('admin.users.index') }}" >Gestionar Usuarios</a></li>
                                <li><a href="{{ route('admin.countries.index') }}">Gestionar Paises</a></li>
                                <li><a href="{{ route('admin.categories.index') }}">Gestionar Categorias</a></li>
                                <li><a href="{{ route('admin.subcategories.index') }}">Gestionar Subcategorias</a></li>
                                <li><a href="{{ route('admin.tags.index') }}">Gestionar Tags</a></li>
                                </ul>
                        </li>
                                @else
                                @endif
                                
                                @else @endif
                            

                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="">Mi perfil</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>