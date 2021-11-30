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
{{-- <li class="nav-item">
    <a href="/books" class="nav-link {{ Request::is('books*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Book</p>
    </a>
</li> --}}
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
<li class="nav-item">
    <a href="/publishers" class="nav-link {{ Request::is('publishers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Publishers</p>
    </a>
</li>
{{-- <li class="nav-item">
    <a href="/borrowings" class="nav-link {{ Request::is('borrowings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-reader"></i>
        <p>Borrowing</p>
    </a>
</li>
<li class="nav-item">
    <a href="/returns" class="nav-link {{ Request::is('returns*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-reader"></i>
        <p>Return</p>
    </a>
</li>
<li class="nav-item">
    <a href="/reports" class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-reader"></i>
        <p>Report</p>
    </a>
</li> --}}
