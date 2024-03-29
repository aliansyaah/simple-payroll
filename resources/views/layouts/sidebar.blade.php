<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="@if (Request::segment(1) == 'dashboard') active @endif"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Menu</li>
        {{-- <li class="nav-item dropdown @if (Request::segment(1) == 'konfigurasi') active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Konfigurasi</span></a>
            <ul class="dropdown-menu">
                <li class="
                    @if (Request::segment(1) == 'konfigurasi' and Request::segment(2) == 'setup') active @endif
                "><a class="nav-link" href="{{ route('setup.index') }}">Setup Aplikasi</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
        </li> --}}

        {{-- <li class="nav-item dropdown @if (Request::segment(1) == 'master-data') active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
            <ul class="dropdown-menu">
                @can('akses', Model::class)
                    <li class="
                    @if (Request::segment(1) == 'master-data' and Request::segment(2) == 'divisi') active @endif
                    "><a class="nav-link" href="{{ route('divisi.index') }}">Divisi</a></li>
                @endcan
                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
        </li> --}}
        @foreach (SiteHelpers::main_menu() as $mm)
            <li class="nav-item dropdown @if (Request::segment(1) == $mm->url) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>{{ $mm->nama_menu }}</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class="
                    @if (Request::segment(1) == 'master-data' and Request::segment(2) == 'divisi') active @endif
                    "><a class="nav-link" href="{{ route('divisi.index') }}">Divisi</a></li> --}}

                    @foreach (SiteHelpers::sub_menu() as $sm)
                        @if ($sm->master_menu == $mm->id)
                            <li class="
                            @if (Request::segment(1).'/'.Request::segment(2) == $sm->url) active @endif
                            "><a class="nav-link" href="{{ url($sm->url) }}">{{ $sm->nama_menu }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach

        <!-- <li class="active"><a class="nav-link" href="crud"><i class="far fa-square"></i> <span>CRUD</span></a></li> -->
        {{-- <li class="active"><a class="nav-link" href="{{ route('crud.read') }}"><i class="far fa-square"></i> <span>CRUD</span></a></li> --}}

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
            </ul>
        </li>

        <li class="menu-header">Pages</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
            <ul class="dropdown-menu">
            <li><a href="utilities-contact.html">Contact</a></li>
            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
            <li><a href="utilities-subscribe.html">Subscribe</a></li>
            </ul>
        </li>
        
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
        </div>
    </aside>
</div>