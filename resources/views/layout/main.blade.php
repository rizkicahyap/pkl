<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts -->
    <link href="{{ asset('stylecss/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('stylecss/indexcss.css') }}" rel="stylesheet">
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link href="{{ asset('sweetalert/sweetalert2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    @yield('sidebar')
    

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
                                <i class="fas fa-user-circle"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Tim PKL UNDIP &copy;2020 BPR BKK Kota Semarang , All Right Reserved</span>
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


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}" ></script>
    
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script> $(document).ready(function () {
                var table = $('#ssfp').DataTable();
            })
    </script>

    <script>
    var flash = $('#flash').data('flash');
    if(flash){
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            text: flash,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }

    var flash1 = $('#flash1').data('flash1');
    if(flash1){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: flash1,
            timer: 5000
        })
    }
    </script>

    <script>
    $(document).on('click', '#btn-hapus', function(e){
        e.preventDefault();
        var form =  $(this).closest("form");
        // var name = $(this).data("name");

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#26d985',
            cancelButtonColor: '#D52A3C',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                
            }
        });
    });
    </script>

    <script>
    $(document).on('click', '#btn-akses2', function(e){
        e.preventDefault();
        var form =  $(this).closest("form");
        // var name = $(this).data("name");

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Pemberian Akses membuat admin dapat mengubah atau menghapus data!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#26d985',
            cancelButtonColor: '#D52A3C',
            confirmButtonText: 'Ya, beri!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                
            }
        });
    });
    </script>

    <script>
    $(document).on('click', '#btn-validasi', function(e){
        e.preventDefault();
        var form =  $(this).closest("form");
        // var name = $(this).data("name");

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Pemberian Validasi membuat akun dapat melakukan Login!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#26d985',
            cancelButtonColor: '#D52A3C',
            confirmButtonText: 'Ya, beri!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                
            }
        });
    });
    </script>

    <script>
    $(document).on('click', '#btn-akses', function(e){
        e.preventDefault();
        var form =  $(this).closest("form");
        // var name = $(this).data("name");

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Untuk mengirimkan Permintaan Akses!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#26d985',
            cancelButtonColor: '#D52A3C',
            confirmButtonText: 'Ya, kirim!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                
            }
        });
    });
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor', {
        // enterMode: CKEDITOR.ENTER_BR

        customConfig: '',

        // Make the editing area bigger than default.
		height: 800,

		// This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
		bodyClass: 'document-editor',

		

    });
    </script>


</body>

</html>