<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PassportApp</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- data tables cdn link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- <!-- select picker -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet"> --}}


</head>

<body>

    <div class="main-header bg-danger">
        <div class="logo-header bg-danger">
            <a href="#" class="logo" disabled>
                PassportApp
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">

        </nav>
    </div>
    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{ asset('img/profile.jpg') }}">
                </div>
                <div class="info">
                    @auth
                    <a class="text-decoration-none" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    @endauth
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <i class="la la-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('pegawai*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/pegawai') }}">
                        <i class="la la-table"></i>
                        <p>Kelola Pegawai</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('passport*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/passport') }}">
                        <i class="la la-table"></i>
                        <p>Kelola Passport</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('listpassport*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/listpassport') }}">
                        <i class="la la-table"></i>
                        <p>Kelola Kegiatan</p>
                    </a>
                </li>
            </ul>
            @auth
            <div class="d-flex justify-content-center mt-5">
                <a class="logout text-secondary text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    <span class="link-collapse"><i class="bi bi-box-arrow-right mr-2"></i>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endauth
        </div>
    </div>
    <main class="py-4 col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
        @include('sweetalert::alert')
    </main>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js%22%3E"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/ready.min.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>

    {{-- <!-- Script untuk search select button -->

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script> --}}

    <script>
        new DataTable('#example');
        //$('#example').dataTable();

        $(document).ready(function () {
            $('.sidenav-toggler').click(function () {
                $('.wrapper').toggleClass('toggled');
            });
        });


        //JS untuk search Select button
        new TomSelect("#select-state", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });

        // Mendapatkan URL saat ini
        var currentUrl = window.location.href;

        // Mencari elemen <a> di dalam elemen <li> di dalam elemen dengan kelas "nav"
        var navItems = document.querySelectorAll('.nav li');

        // Menghapus kelas "active" dari semua elemen <li>
        navItems.forEach(function (item) {
            item.classList.remove('active');
        });

        // Menambahkan kelas "active" ke elemen <li> yang sesuai dengan URL saat ini
        navItems.forEach(function (item) {
            var link = item.querySelector('a');
            if (link.getAttribute('href') === currentUrl) {
                item.classList.add('active');
            }
        });

        // Search
        var searchForm = document.getElementById('searchForm');
        var searchInput = document.getElementById('searchInput');
        var dataTable = document.getElementById('dataTable');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var keyword = searchInput.value.toLowerCase().trim();

            // Kirim permintaan pencarian ke backend
            fetch('/search?keyword=' + encodeURIComponent(keyword))
                .then(response => response.json())
                .then(data => {
                    // Memperbarui tampilan tabel dengan data yang diterima dari backend
                    updateTable(data);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });

        function updateTable(data) {
            // Hapus semua baris dalam tabel kecuali header
            var rows = dataTable.getElementsByTagName('tr');
            for (var i = rows.length - 1; i > 0; i--) {
                dataTable.removeChild(rows[i]);
            }

            // Tambahkan baris baru berdasarkan data yang diterima dari backend
            data.forEach(function (item) {
                var row = dataTable.insertRow();
                var cell1 = row.insertCell();
                var cell2 = row.insertCell();
                // Tambahkan logika sesuai dengan struktur tabel dan data yang ingin ditampilkan
                cell1.textContent = item.column1;
                cell2.textContent = item.column2;
            });
        }
        $('body').on('click', '.btn-hapus', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#modal-hapus').find('form').attr('action', url);
            $('#modal-hapus').modal();
        });
    </script>
</body>

</html>