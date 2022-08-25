
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('home') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('home') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="{{ asset('home') }}assets/img/favicon.png" rel="icon">

  <link rel="stylesheet" href="{{ asset('css/login.css') }}" media="screen" title="no title">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alike+Angular&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('home') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('home') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('home') }}/assets/css/style.css" rel="stylesheet">
  {{-- css:external --}}
   @stack('css-external')
  {{-- css:internal --}}
   @stack('css-internal')

  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @livewireStyles
</head>

<body style="background-color: #F2F2F2">
    @include('components.home.header')

    @yield('carousel')

    @yield('content')

    @yield('contact')

    @yield('client')


  <!-- Vendor JS Files -->
  <script src="{{ asset('home') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('home') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('home') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('home') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('home') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('home') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('home') }}/assets/js/main.js"></script>
  <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    AOS.init();
  </script>

    <script type="text/javascript">

    </script>
    {{-- javascript:external --}}
    @stack('javascript-external')
    {{-- javascript:internal --}}
    @stack('javascript-internal')

  @livewireScripts

  <script>
    $(function(){
          $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#provinsi').on('change', function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkabupaten') }}",
                    data : {id_provinsi:id_provinsi},
                    cahce : false,

                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },

                    error: function(data){
                        console.log('error:', data)
                    },
                })
            })
        })
        $(function(){
            $('#kabupaten').on('change', function(){
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkecamatan') }}",
                    data : {id_kabupaten:id_kabupaten},
                    cahce : false,

                    success: function(msg){
                        $('#kecamatan').html(msg);

                    },

                    error: function(data){
                        console.log('error:', data)
                    },
                })
            })
        })
        $(function(){
            $('#kecamatan').on('change', function(){
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type : 'POST',
                    url : "{{ route('getdesa') }}",
                    data : {id_kecamatan:id_kecamatan},
                    cahce : false,

                    success: function(msg){
                        $('#desa').html(msg);
                    },

                    error: function(data){
                        console.log('error:', data)
                    },
                })
            })
        })
    });
</script>


</body>

</html>
