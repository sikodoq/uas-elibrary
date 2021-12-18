<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
    </a>
</li>
@auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
        {{-- treemenu book management --}}
        <li class="nav-item {{ Request::is('books*', 'authors*', 'categories*', 'publishers*') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ Request::is('books*', 'authors*', 'categories*', 'publishers*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-medical"></i>
                <p>
                    Book Management
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/books" class="nav-link {{ Request::is('books*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/authors" class="nav-link {{ Request::is('authors*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Authors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/publishers" class="nav-link {{ Request::is('publishers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Publishers</p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- end treemenu book management --}}
    @endif
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
        <li class="nav-item">
            <a href="/members" class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Members</p>
            </a>
        </li>
    @endif
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
        <li class="nav-item">
            <a href="/transactions" class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>Transaction</p>
            </a>
        </li>
    @endif
    @if (Auth::user()->role == 'Admin')
        <li class="nav-item">
            <a href="/users" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
    @endif
    {{-- @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
        <li class="nav-item">
            <a href="/reports" class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Report</p>
            </a>
        </li>
    @endif --}}
@endauth
