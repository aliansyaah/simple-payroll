<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- <title>Blank Page &mdash; Stisla</title> -->
    <title>@yield('title') {{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}"

    {{-- Untuk page styling --}}
    @stack('page-styles')
</head>

<body>
    <div id="app">
    <div class="main-wrapper">
        {{-- Kita akan include file di dlm folder layouts dgn nama header --}}
        @include('layouts.header')

        {{-- Kita akan include file di dlm folder layouts dgn nama sidebar --}}
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
            <div class="section-header">
                {{-- <h1>Blank Page</h1> --}}
                <h1>{{ SiteHelpers::get_menu_name(request()->route()->uri) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>

            @yield('content')
            </section>

            @yield('modal')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">
            2.3.0
            </div>
        </footer>
    </div>
    </div>

    {{-- Untuk tampung script jika ada kebutuhan load JS sebelum general JS --}}
    @stack('before-general-scripts')

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    @stack('page-scripts')

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    {{-- Untuk tampung JS sesuai kebutuhan per halaman  --}}
    @stack('after-script')
</body>
</html>
