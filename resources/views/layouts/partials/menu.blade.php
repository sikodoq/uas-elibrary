<!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="/users" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>User
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="/authors" class="nav-link {{ Request::is('authors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>Author</p>
    </a>
</li>
<li class="nav-item">
    <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>Category</p>
    </a>
</li>
