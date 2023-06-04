<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/" class="sidebar-brand">
            Jadwal<span>RMIK</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.jadwal') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role === 'admin')
            <li class="nav-item nav-category">Web Apps</li>
            <li class="nav-item">
                <a href="{{ route('admin.usercontrol') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">User Control</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.lab') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Labs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.kelas') }}" class="nav-link">
                    <i class="link-icon" data-feather="columns"></i>
                    <span class="link-title">Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.matkul') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Mata Kuliah</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
