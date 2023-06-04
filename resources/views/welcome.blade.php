<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="NobleUI" />
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <title>Jadwal RMIK</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}" />
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo3/style.css') }}" />
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon2.png') }}" />
</head>

<body>
    <div class="main-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar">
                <div class="container">
                    <div class="navbar-content">
                        <a href="/" class="navbar-brand"> Jadwal<span>RMIK</span> </a>
                        @if (Route::has('login'))
                            <ul class="navbar-nav">
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img class="wd-30 ht-30 rounded-circle"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="profile" />
                                            </a>
                                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                                    <div class="mb-3">
                                                        <img class="wd-80 ht-80 rounded-circle"
                                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="" />
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                                        <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled p-1">
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('admin.jadwal') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="box"></i>
                                                            <span>Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('profile.edit') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="edit"></i>
                                                            <span>Edit Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('logout') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                                            <span>Log Out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @elseif(Auth::user()->role === 'dosen')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img class="wd-30 ht-30 rounded-circle"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="profile" />
                                            </a>
                                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                                    <div class="mb-3">
                                                        <img class="wd-80 ht-80 rounded-circle"
                                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="" />
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                                        <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled p-1">
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('dosen.jadwal') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="box"></i>
                                                            <span>Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('profile.edit') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="edit"></i>
                                                            <span>Edit Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('logout') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                                            <span>Log Out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img class="wd-30 ht-30 rounded-circle"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="profile" />
                                            </a>
                                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                                    <div class="mb-3">
                                                        <img class="wd-80 ht-80 rounded-circle"
                                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="" />
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                                        <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled p-1">
                                                    <li class="dropdown-item py-2">
                                                        <a href="{{ route('logout') }}" class="text-body ms-0">
                                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                                            <span>Log Out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <span class="menu-title">Login</span>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">
                                                <span class="menu-title">Register</span>
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        <!-- partial -->

        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mb-3 mt-4">Jadwal RMIK</h3>
                                <p class="text-muted text-center mb-4 pb-2">Berikut adalah jadwal Laboratorium yang
                                    terserdia.</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive pt-3">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Lab</th>
                                                                    <th>Nama Dosen</th>
                                                                    <th>Mata Kuliah</th>
                                                                    <th>Kelas</th>
                                                                    <th>Waktu Pelaksanaan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($jadwal as $jdwl)
                                                                    <tr>
                                                                        <td>{{ $jdwl->nama_lab }}</td>
                                                                        <td>{{ $jdwl->nama_dosen }}</td>
                                                                        <td>{{ $jdwl->nama_matkul }}</td>
                                                                        <td>{{ $jdwl->nama_kelas }}</td>
                                                                        <td>{{ $jdwl->waktu }}</td>
                                                                        <td>{{ $jdwl->tanggal }}</td>
                                                                        <td>
                                                                            @if ($jdwl->status === 'Diterima')
                                                                                <span
                                                                                    class="badge bg-success">Diterima</span>
                                                                            @elseif($jdwl->status === 'Pending')
                                                                                <span
                                                                                    class="badge bg-warning">Pending</span>
                                                                            @elseif($jdwl->status === 'Ditolak')
                                                                                <span
                                                                                    class="badge bg-danger">Ditolak</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer border-top">
                <div
                    class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
                    <p class="text-muted mb-1 mb-md-0">
                        Copyright © 2022
                        <a href="#" target="_blank">NobleUI</a>.
                    </p>
                    <p class="text-muted">
                        Handcrafted With
                        <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i>
                         by Ucup
                    </p>
                </div>
            </footer>
            <!-- partial -->
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>
