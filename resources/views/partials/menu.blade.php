<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('solicitude_access')
                <li class="nav-item">
                    <a href="{{ route("admin.solicitudes.index") }}" class="nav-link {{ request()->is('admin/solicitudes') || request()->is('admin/solicitudes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-bell nav-icon">

                        </i>
                        Salida de Material
                    </a>
                </li>
            @endcan
            @can('ingreso_materiale_access')
                <li class="nav-item">
                    <a href="{{ route("admin.ingreso-materiales.create") }}" class="nav-link {{ request()->is('admin/ingreso-materiales') || request()->is('admin/ingreso-materiales/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-sign-in-alt nav-icon">

                        </i>
                        {{ trans('cruds.ingresoMateriale.title') }}
                    </a>
                </li>
            @endcan
            @can('administracion_de_biene_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cart-arrow-down nav-icon">

                        </i>
                        {{ trans('cruds.administracionDeBiene.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('materiale_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.materiales.index") }}" class="nav-link {{ request()->is('admin/materiales') || request()->is('admin/materiales/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-paint-roller nav-icon">

                                    </i>
                                    {{ trans('cruds.materiale.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('activo_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.activos.index") }}" class="nav-link {{ request()->is('admin/activos') || request()->is('admin/activos/*') ? 'active' : '' }}">
                                    <i class="fa-fw fab fa-autoprefixer nav-icon">

                                    </i>
                                    {{ trans('cruds.activo.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('muestra_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.muestras.index") }}" class="nav-link {{ request()->is('admin/muestras') || request()->is('admin/muestras/*') ? 'active' : '' }}">
                                    <i class="fa-fw far fa-images nav-icon">

                                    </i>
                                    {{ trans('cruds.muestra.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('herramientum_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.herramienta.index") }}" class="nav-link {{ request()->is('admin/herramienta') || request()->is('admin/herramienta/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-wrench nav-icon">

                                    </i>
                                    {{ trans('cruds.herramientum.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gestion_servicio_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.gestionServicio.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('beneficiario_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.beneficiarios.index") }}" class="nav-link {{ request()->is('admin/beneficiarios') || request()->is('admin/beneficiarios/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-people-carry nav-icon">

                                    </i>
                                    {{ trans('cruds.beneficiario.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('maquina_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.maquinas.index") }}" class="nav-link {{ request()->is('admin/maquinas') || request()->is('admin/maquinas/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.maquina.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('asistencia_tecnica_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.asistencia-tecnicas.index") }}" class="nav-link {{ request()->is('admin/asistencia-tecnicas') || request()->is('admin/asistencia-tecnicas/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-hands-helping nav-icon">

                                    </i>
                                    {{ trans('cruds.asistenciaTecnica.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('diseno_asistido_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.diseno-asistidos.index") }}" class="nav-link {{ request()->is('admin/diseno-asistidos') || request()->is('admin/diseno-asistidos/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-laptop nav-icon">

                                    </i>
                                    {{ trans('cruds.disenoAsistido.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('capacitacion_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.capacitacions.index") }}" class="nav-link {{ request()->is('admin/capacitacions') || request()->is('admin/capacitacions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chalkboard-teacher nav-icon">

                                    </i>
                                    {{ trans('cruds.capacitacion.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('fabricacion_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.fabricacions.index") }}" class="nav-link {{ request()->is('admin/fabricacions') || request()->is('admin/fabricacions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-industry nav-icon">

                                    </i>
                                    {{ trans('cruds.fabricacion.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('localizacione_access')
                <li class="nav-item">
                    <a href="{{ route("admin.localizaciones.index") }}" class="nav-link {{ request()->is('admin/localizaciones') || request()->is('admin/localizaciones/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-atlas nav-icon">

                        </i>
                        {{ trans('cruds.localizacione.title') }}
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>