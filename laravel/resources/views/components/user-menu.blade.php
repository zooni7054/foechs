<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('/') }}" class="nav-link" target="_blank">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    Visit Website
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('posts.index') }}"
                class="nav-link {{ request()->is('admin/society-updates', 'admin/society-updates/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                    Society Updates
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('events.index') }}"
                class="nav-link {{ request()->is('admin/events', 'admin/events/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Events
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('albums.index') }}"
                class="nav-link {{ request()->is('admin/albums', 'admin/albums/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Gallery Albums
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('members.index') }}"
                class="nav-link {{ request()->is('admin/management-committee', 'admin/management-committee/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Management Committee
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('tenders.index') }}"
                class="nav-link {{ request()->is('admin/tenders-procurements', 'admin/tenders-procurements/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-archway"></i>
                <p>
                    Tenders & Procurements
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('documents.index') }}"
                class="nav-link {{ request()->is('admin/forms-documents', 'admin/forms-documents/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-clone"></i>
                <p>
                    Forms & Documents
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pages.index') }}"
                class="nav-link {{ request()->is('admin/pages', 'admin/pages/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Pages
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('tickers.index') }}"
                class="nav-link {{ request()->is('admin/tickers', 'admin/tickers/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-asterisk"></i>
                <p>
                    Tickers
                </p>
            </a>
        </li>


        <li class="nav-header">SETTINGS</li>

        <li class="nav-item">
            <a href="{{ route('settings.index') }}"
                class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>

        <li class="nav-item {{ request()->is('admin/users', 'admin/users/*', 'admin/roles', 'admin/roles/*') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/users', 'admin/users/*', 'admin/roles', 'admin/roles/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->is('admin/users', 'admin/users/*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>

                @if (Auth::user()->roles[0]->name == 'Super Admin')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}"
                            class="nav-link {{ request()->is('admin/roles', 'admin/roles/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User Roles</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

    </ul>
</nav>
