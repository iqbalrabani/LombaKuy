<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - List Event</title>
    
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img src="/images/logo.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">LombaKuy</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(null);" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, Admin</span>
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- START OF CUSTOM --}}
                    <div class="container">
                        <br>
                        <h1 class="mb-4 text-gray-800">Admin Dashboard</h1>
                        <br>
                        <form action="/event/add" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control" id="idLomba" name="idLomba" placeholder="ID" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" id="namaLomba" name="namaLomba" placeholder="Nama lomba" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control" id="kategoriLomba" name="kategoriLomba" placeholder="Kategori" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" onfocus="(this.type='date')" class="form-control" id="batasPendaftaran" name="batasPendaftaran" placeholder="Batas pendaftaran" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-success">Add Lomba</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lomba</th>
                                    <th>Kategori Lomba</th>
                                    <th>Kapasitas</th>
                                    <th>Batas Pendaftaran</th>
                                    <th>Penyelenggara</th>
                                    <th>Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lombas as $l)
                                <tr>
                                    <td>{{ $l->idLomba }}</td>
                                    <td>{{ $l->namaLomba }}</td>
                                    <td>{{ $l->kategoriLomba }}</td>
                                    <td>{{ $l->kapasitas }}</td>
                                    <td>{{ $l->batasPendaftaran }}</td>
                                    <td>{{ $l->penyelenggara }}</td>
                                    <td>{{ $l->biaya }}</td>
                                    <td>
                                        <button class="btn btn-info mr-2 show-button" data-id="{{ $l->idLomba }}" data-toggle="modal" data-target="#contohModal">Show</button>
                                        <a href='/event/edit/{{$l->idLomba}}' class='btn btn-primary mr-2'>Edit</a>
                                        <a href='/event/delete/{{$l->idLomba}}' class='btn btn-danger' data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <!-- Modal untuk menampilkan ringkasan lomba -->
                    <div class="modal fade" id="contohModal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Ringkasan Lomba</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID Lomba:</strong> <span id="modalIdLomba"></span></p>
                                    <p><strong>Nama Lomba:</strong> <span id="modalNamaLomba"></span></p>
                                    <p><strong>Kategori Lomba:</strong> <span id="modalKategoriLomba"></span></p>
                                    <p><strong>Kapasitas:</strong> <span id="modalKapasitas"></span></p>
                                    <p><strong>Batas Pendaftaran:</strong> <span id="modalBatasPendaftaran"></span></p>
                                    <p><strong>Penyelenggara:</strong> <span id="modalPenyelenggara"></span></p>
                                    <p><strong>Biaya Pendaftaran:</strong> <span id="modalBiaya"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END OF CUSTOM --}}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LombaKuy 2023. <a href="" data-toggle="modal" data-target="#contributorModal"><b>See Our Team.</b></a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/sesi/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contributors Modal-->
    <div class="modal fade" id="contributorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Meet Our Team</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nathan Daud - 215150200111053</div>
                <div class="modal-body">Muhammad Iqbal Rabani - 215150207111051</div>
                <div class="modal-body">Haidar Hanif - 215150201111048</div>
                <div class="modal-body">I Gusti Ngurah Mayun S G P - 215150200111047</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below to confirm the deletion.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FontAwesome Icon -->
    <script src="https://kit.fontawesome.com/eaf3a862c8.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/custom.js"></script>

    <!-- Modal for Show Button-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.show-button').click(function() {
                var idLomba = $(this).data('id');
                var namaLomba = $(this).closest('tr').find('td:eq(1)').text();
                var kategoriLomba = $(this).closest('tr').find('td:eq(2)').text();
                var kapasitas = $(this).closest('tr').find('td:eq(3)').text();
                var batasPendaftaran = $(this).closest('tr').find('td:eq(4)').text();
                var penyelenggara = $(this).closest('tr').find('td:eq(5)').text();
                var biaya = $(this).closest('tr').find('td:eq(6)').text();

                $('#modalIdLomba').text(idLomba);
                $('#modalNamaLomba').text(namaLomba);
                $('#modalKategoriLomba').text(kategoriLomba);
                $('#modalKapasitas').text(kapasitas);
                $('#modalBatasPendaftaran').text(batasPendaftaran);
                $('#modalPenyelenggara').text(penyelenggara);
                $('#modalBiaya').text(biaya);
                $('#contohModal').modal('show');
            });
        });
    </script>
</body>

</html>