{{-- HEADER AND FOOTER +EXTENDS NAVBAR AND CONTENT --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="site d'information sur l'intelligence artificielle" name="description">
    <meta content="intelligence artificielle, big data, apprentissage, reseau, neurones, machine,donnees, langage" name="keywords">
    <meta content="width=50%, initial-scale=1" name="viewport">
    <meta content="index,follow" name="robots">

    @extends('forme.asset-css')

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Gestion d'article</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->


            <li class="nav-item dropdown">

                @if(session('utilisateur'))
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src=<?php echo asset("assets/img/profile-img.jpg")?> alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{session('utilisateur')->nom }} {{session('utilisateur')->prenom }}</span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                      <h6>{{session('utilisateur')->nom }} {{session('utilisateur')->prenom }}</h6>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('auteur.deconnexion')}}">
                    <i class="bi bi-box-arrow-righ"></i>
                        <span>Deconnexion</span>
                    </a>
                    </li>

                @elseif(session('auteur'))
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src=<?php echo asset("assets/img/profile-img.jpg")?> alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{session('auteur')->nom }} {{session('auteur')->prenom }}</span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                      <h6>{{session('auteur')->nom }} {{session('auteur')->prenom }}</h6>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('Auteur/deconnexion')}}">
                    <i class="bi bi-box-arrow-righ"></i>
                        <span>Deconnexion</span>
                    </a>
                    </li>

                @else
                <button type='button' class='btn btn-primary'><a style='color:white;' href='{{ url('Utilisateur/connexion')}}'>Se connecter</a></button>
                @endif

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">


                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">



                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->

    @extends('forme.navbar')


<main id="main" class="main">
        <div class="row">
            <div class="col-lg-6">
                <div class="@yield('type_message')" role="alert">
                        @yield('message')
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        @yield('content')


</main>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
</footer><!-- End Footer -->

</body>

</html>
