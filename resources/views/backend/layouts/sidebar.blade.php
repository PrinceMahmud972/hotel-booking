<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('1.png') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">AmiratHotel</div>
    </a>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Expense</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('expense') }}">ALL Expense List</a>
                <a class="collapse-item" href="{{ route('expense.form') }}">Add Expense</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#room1" aria-expanded="true" aria-controls="collapseBootstrap">
            {{-- <i class="far fa-fw fa-window-maximize"></i> --}}
            <i class="fas fa-bed"></i>
            <span>Room</span>
        </a>
        <div id="room1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('room') }}">ALL Room List</a>
                <a class="collapse-item" href="{{ route('room.create') }}">Add New Room</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fas fa-hotel"></i>
            <span>Room Type</span>
        </a>
        <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('room.type') }}">Room Type List</a>
                <a class="collapse-item" href="{{ route('room.type.create') }}">Add Room Type</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fas fa-hotel"></i>
            <span>Booking</span>
        </a>
        <div id="collapseBootstrap11" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('booking') }}">Booking List</a>
                <a class="collapse-item" href="{{ route('booking.create') }}">Add New Booking</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider" />

    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Contact</span>
        </a>
    </li>
    
    @if (Auth::user()->role == '1')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.service') }}">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Service</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.slider') }}">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Slider</span>
            </a>
        </li>
    @endif

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                <a class="collapse-item" href="datatables.html">DataTables</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-palette"></i>
            <span>UI Colors</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <div class="sidebar-heading">
        Examples
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Example Pages</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <div class="version" id="version-ruangadmin"></div> --}}
</ul>