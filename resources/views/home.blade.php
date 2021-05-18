<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$setting[0]->nama_kegiatan}} | Home</title>
    <link rel="shortcut icon" href="{{ asset('elements/img/logo.png')}}">
    <link href="{{ asset('elements/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
    <section style="height:100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .modal-header-4-1.modal {
                top: 2rem;
            }

            .header-4-1 .navbar,
            .hero-header-4-1 {
                padding: 3rem 2rem;
            }

            .header-4-1 .navbar-light .navbar-nav .nav-link {
                font-size: 18px;
                color: #1d1e3c;
                font-weight: 300;
                line-height: 1.5rem;
            }

            .header-4-1 .navbar-light .navbar-nav .nav-link:hover {
                font-size: 18px;
                color: #1d1e3c;
                font-weight: 600;
                line-height: 1.5rem;
            }

            .header-4-1 .navbar-light .navbar-nav .active>.nav-link,
            .header-4-1 .navbar-light .navbar-nav .nav-link.active,
            .header-4-1 .navbar-light .navbar-nav .nav-link.show,
            .header-4-1 .navbar-light .navbar-nav .show>.nav-link {
                font-weight: 600;
            }

            .header-4-1 .navbar-light .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            .header-4-1 .navbar-light .navbar-toggler {
                border: none;
            }

            .modal-content-header-4-1 .modal-header,
            .modal-content-header-4-1 .modal-footer {
                border: none;
            }

            .btn:focus,
            .btn:active {
                outline: none !important;
            }

            .btn-fill-header-4-1 {
                background-color: #ff7c57;
                border-radius: 12px;
                color: #ffffff;
                font-weight: 600;
                padding: 12px 32px 12px 32px;
                font-size: 18px;
            }

            .btn-fill-header-4-1:hover {
                color: #ffffff;
                --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .btn-no-fill-header-4-1 {
                color: #1D1E3C;
                font-weight: 300;
                line-height: 1.75rem;
                padding: 12px 32px 12px 32px;
                font-size: 18px;
            }

            .modal-header-4-1 .modal-dialog .modal-content {
                border-radius: 8px;
                background-color: #FFFFFF;
                border: none;
            }

            .responsive-header-4-1 li a {
                padding: 1rem 1rem;
            }

            .text-caption-header-4-1 {
                margin-bottom: 2rem;
                line-height: 1.625;
                font-size: 0.875rem;
                line-height: 1.25rem;
                font-weight: 600;
                color: #ff7c57;
            }

            .left-column-header-4-1 {
                margin-bottom: 0.75rem;
                width: 100%;
            }

            .right-column-header-4-1 {
                width: 100%;
            }

            .title-text-big-header-1 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 2.25rem;
                line-height: 2.5rem;
                color: #272E35;
            }

            .title-text-big-header-2 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 3rem;
                line-height: 2.5rem;
                color: #272E35;
                margin-top: -10px;
            }

            .title-text-big-header-3 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 1.5rem;
                line-height: 2.5rem;
                color: #272E35;
                margin-top: -10px;
            }

            .title-text-small-header-1 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 1.7rem;
                line-height: 2.5rem;
                color: #272E35;
            }

            .title-text-small-header-2 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 2rem;
                line-height: 2.5rem;
                color: #272E35;
                margin-top: -30px;
            }

            .title-text-small-header-3 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 1rem;
                line-height: 2.5rem;
                color: #272E35;
                margin-top: -30px;
            }

            .title-text-small-header-4-1 {
                font-weight: 600;
                margin-bottom: 2rem;
                font-size: 2.25rem;
                line-height: 2.5rem;
                color: #272E35;
                padding-left: 0;
                padding-right: 0;
            }

            .div-button-header-4-1 {
                margin-left: 0;
                margin-right: 0;
            }

            .btn-try-header-4-1 {
                font-weight: 600;
                color: #FFFFFF;
                padding: 1rem 1.5rem 1rem 1.5rem;
                font-size: 1rem;
                line-height: 1.5rem;
                border-radius: 0.75rem;
                background-color: #FF7C57;
                margin-bottom: 1rem;
                margin-right: 0;
            }

            .btn-try-header-4-1:hover {
                color: #FFFFFF;
                --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .btn-outline-header-4-1 {
                font-weight: 400;
                border: 1px solid #555B61;
                color: #555B61;
                padding: 1rem 1.5rem 1rem 1.5rem;
                font-size: 1rem;
                line-height: 1.5rem;
                border-radius: 0.75rem;
                background-color: transparent;
                margin-bottom: 1rem;
            }

            .btn-outline-header-4-1:hover {
                border: 1px solid #FF7C57;
                color: #FF7C57;
            }

            .btn-outline-header-4-1:hover div path {
                fill: #FF7C57;
            }

            @media (min-width: 576px) {
                .modal-header-4-1 .modal-dialog {
                    max-width: 95%;
                    border-radius: 12px;
                }

                .header-4-1 .navbar {
                    padding: 3rem 2rem;
                }

                .hero-header-4-1 {
                    padding: 3rem 2rem 5rem 2rem;
                }

                .title-text-big-header-4-1 {
                    font-size: 3rem;
                    line-height: 1.2;
                }

                .title-text-small-header-4-1 {
                    font-size: 3rem;
                    line-height: 1.2;
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }

                .div-button-header-4-1 {
                    margin-left: 0;
                    margin-right: 0.75rem;
                }

                .btn-try-header-4-1 {
                    margin-bottom: 0;
                    margin-right: 0.75rem;
                }

                .btn-outline-header-4-1 {
                    margin-bottom: 0;
                }
            }

            @media (min-width: 768px) {
                .header-4-1 .navbar {
                    padding: 3rem 4rem;
                }

                .hero-header-4-1 {
                    padding: 3rem 4rem 5rem 4rem;
                }

                .left-column-header-4-1 {
                    margin-bottom: 3rem;
                }

                .title-text-small-header-4-1 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }

                .div-button-header-4-1 {
                    margin-left: 0;
                    margin-right: 0.5rem;
                }

                .btn-try-header-4-1 {
                    margin-right: 0.5rem;
                }
            }

            @media (min-width: 992px) {
                .header-4-1 .navbar-expand-lg .navbar-nav .nav-link {
                    padding-right: 1.25rem;
                    padding-left: 1.25rem;
                }

                .header-4-1 .navbar {
                    padding: 3rem 6rem;
                }

                .hero-header-4-1 {
                    padding: 3rem 6rem 5rem 6rem;
                }

                .left-column-header-4-1 {
                    width: 50%;
                    margin-bottom: 0;
                }

                .right-column-header-4-1 {
                    width: 50%;
                }

                .title-text-big-header-4-1 {
                    font-size: 3.75rem;
                    line-height: 1.2;
                }

                .title-text-small-header-4-1 {
                    font-size: 3.75rem;
                    line-height: 1.2;
                }

                .div-button-header-4-1 {
                    margin-left: 0;
                    margin-right: 2rem;
                }

                .btn-try-header-4-1 {
                    margin-right: 2rem;
                }
            }
        </style>
        <div class="header-4-1" style="font-family: 'Poppins', sans-serif;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="#">
                    <img style="margin-right:0.75rem" src="{{ asset('elements/img/logo.png')}}" alt="UpVote-Logo">
                </a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-header-4-1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="modal-header-4-1 modal fade" id="targetModal-header-4-1" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel-header-4-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-header-4-1">
                            <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
                                <a class="modal-title" id="targetModalLabel-header-4-1">
                                    <img style="margin-top:0.5rem" src="{{ asset('elements/img/logo.png')}}" alt="UpVote-Logo">
                                </a>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                                <ul class="navbar-nav responsive-header-4-1 me-auto mt-2 mt-lg-0">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tutorial">Tutorial</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::route('dashboard')}}">Pilih Sekarang!</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
                                @if (!Auth::user())
                                <a href="{{URL::route('login')}}" class="btn btn-fill-header-4-1">Masuk</a>
                                @elseif (Auth::user())
                                <a href="{{URL::route('dashboard')}}" style="font-size: 18px;color: #1d1e3c;font-weight: 300;line-height: 1.5rem;text-decoration: none;">Selamat datang, <b>{{Auth::user()->name}}!</b></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-4-1">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tutorial">Tutorial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::route('dashboard')}}">Pilih Sekarang!</a>
                        </li>
                    </ul>
                    @if (!Auth::user())
                    <a href="{{URL::route('login')}}" class="btn btn-fill-header-4-1">Masuk</a>
                    @elseif (Auth::user())
                    <a href="{{URL::route('dashboard')}}" style="font-size: 18px;color: #1d1e3c;font-weight: 300;line-height: 1.5rem;text-decoration: none;">Selamat datang, <b>{{Auth::user()->name}}!</b></a>
                    @endif
                </div>
            </nav>

            <div>
                <div class="mx-auto d-flex flex-lg-row flex-column hero-header-4-1">
                    <!-- Left Column -->
                    <div class="left-column-header-4-1 d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                        <h1 class="title-text-big-header-1 d-lg-inline d-none">{{$setting[0]->nama_kegiatan}}</h1>
                        <h1 class="title-text-big-header-2 d-lg-inline d-none">{{$setting[0]->nama_instansi}}</h1>
                        <h1 class="title-text-big-header-3 d-lg-inline d-none">{{$setting[0]->periode}}</h1>
                        <h1 class="title-text-small-header-1 d-lg-none d-inline">{{$setting[0]->nama_kegiatan}}</h1>
                        <h1 class="title-text-small-header-2 d-lg-none d-inline">{{$setting[0]->nama_instansi}}</h1>
                        <h1 class="title-text-small-header-3 d-lg-none d-inline">{{$setting[0]->periode}}</h1>
                        <div class="div-button-header-4-1 d-inline d-lg-flex align-items-center mx-lg-0 mx-auto justify-content-center">
                            <a href="{{URL::route('login')}}" class="btn d-inline-flex mb-md-0 btn-try-header-4-1">Masuk</a>
                            <a href="{{URL::route('dashboard')}}" class="btn btn-outline-header-4-1">
                                <div class="d-flex align-items-center">
                                    Pilih sekarang!
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column-header-4-1 text-center d-flex justify-content-lg-end justify-content-center pe-0">
                        <img id="img-fluid" style="display: block;max-width: 100%;height: auto;" src="{{ asset('elements/img/Header-4-1.png')}}" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>
    <section style="height:100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn:focus,
            .btn:active {
                outline: none !important;
            }

            .main-content-3-1 {
                padding: 5rem 2rem 5rem 2rem;
            }

            .img-hero-content-3-1 {
                width: 100%;
                margin-bottom: 3rem;
            }

            .right-column-content-3-1 {
                width: 100%;
            }

            .title-text-content-3-1 {
                font-size: 1.875rem;
                line-height: 2.25rem;
                font-weight: 600;
                margin-bottom: 2.5rem;
                letter-spacing: -0.025em;
                color: #121212;
            }

            .title-caption-content-3-1 {
                font-weight: 500;
                font-size: 1.5rem;
                line-height: 2rem;
                margin-bottom: 1.25rem;
                color: #121212;
            }

            .circle-content-3-1 {
                height: 3rem;
                width: 3rem;
                font-size: 1.25rem;
                line-height: 1.75rem;
                margin-bottom: 1.25rem;
                color: #FFFFFF;
                border-radius: 9999px;
                background-color: #FFBF56;
            }

            .text-caption-content-3-1 {
                font-size: 1rem;
                line-height: 1.5rem;
                letter-spacing: 0.025em;
                line-height: 1.75rem;
                color: #565656;
            }

            .btn-content-3-1 {
                font-weight: 600;
                font-size: 1rem;
                line-height: 1.5rem;
                color: #FFFFFF;
                padding: 1rem 2.5rem 1rem 2.5rem;
                background-color: #FF7C57;
                transition: 0.3s;
                letter-spacing: 0.025em;
                border-radius: 0.75rem;
            }

            .btn-content-3-1:hover {
                color: #FFFFFF;
                background-color: #FF9779;
                transition: 0.3s;
            }

            @media (min-width: 576px) {}

            @media (min-width: 768px) {
                .title-text-content-3-1 {
                    font-size: 2.25rem;
                    line-height: 2.5rem;
                }
            }

            @media (min-width: 992px) {
                .img-hero-content-3-1 {
                    width: 50%;
                    margin-bottom: 0;
                }

                .right-column-content-3-1 {
                    width: 50%;
                }

                .circle-content-3-1 {
                    margin-right: 1.25rem;
                    margin-bottom: 0;
                }
            }

            @media (min-width: 1200px) {}
        </style>
        <div id="tutorial" class="main-content-3-1" style="font-family: 'Poppins', sans-serif;">
            <div class="d-flex flex-lg-row flex-column align-items-center">
                <!-- Left Column -->
                <div class="img-hero-content-3-1 text-center justify-content-center d-flex">
                    <img id="hero-content-3-1" class="img-fluid" src="{{ asset('elements/img/Content-3-1.png')}}" alt="">
                </div>

                <!-- Right Column -->
                <div class="right-column-content-3-1 d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                    <h2 class="title-text-content-3-1">Cara Melakukan Pemilihan</h2>
                    <ul style="padding:0;margin:0">
                        <li class="list-unstyled" style="margin-bottom: 2rem;">
                            <h4 class="title-caption-content-3-1 d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                                <span class="circle-content-3-1 d-flex align-items-center justify-content-center">
                                    1
                                </span>
                                Masuk Menggunakan Token Anda
                            </h4>
                            <p class="text-caption-content-3-1 d-sm-inline d-none">
                                Buka halaman login, lalu masukkan token atau Email dan password <br> anda yang
                                sudah diberi oleh panitia.
                            </p>
                            <p class="text-caption-content-3-1 d-sm-none d-inline">
                                Buka halaman login, lalu masukkan token atau Email dan password <br> anda yang
                                sudah diberi oleh panitia.
                            </p>
                        </li>
                        <li class="list-unstyled" style="margin-bottom: 2rem;">
                            <h4 class="title-caption-content-3-1 d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                                <span class="circle-content-3-1 d-flex align-items-center justify-content-center">
                                    2
                                </span>
                                Lihat Visi & Misi Calon
                            </h4>
                            <p class="text-caption-content-3-1 d-sm-inline d-none">
                                klik tombol visi & misi pada salah satu <br> calon untuk melihat visi & misi
                            </p>
                            <p class="text-caption-content-3-1 d-sm-none d-inline">
                                klik tombol visi & misi pada salah satu <br> calon untuk melihat visi & misi
                            </p>
                        </li>
                        <li class="list-unstyled" style="margin-bottom: 4rem;">
                            <h4 class="title-caption-content-3-1 d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                                <span class="circle-content-3-1 d-flex align-items-center justify-content-center">
                                    3
                                </span>
                                Pilih Calon Yang Diinginkan
                            </h4>
                            <p class="text-caption-content-3-1 d-sm-inline d-none">
                                Setelah melihat visi & misi calon, <br> jika sudah yakin maka klik tombol pilih untuk memilih.
                            </p>
                            <p class="text-caption-content-3-1 d-sm-none d-inline">
                                Setelah melihat visi & misi calon, <br> jika sudah yakin maka klik tombol pilih untuk memilih.
                            </p>
                        </li>
                    </ul>
                    <a href="{{URL::route('dashboard')}}" class="btn btn-content-3-1">Pilih Sekarang!</a>
                </div>
            </div>


        </div>

    </section>
    <section style="height: 100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF;">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .list-space-footer-2-1 {
                margin-bottom: 1.25rem;
            }

            .list-space-footer-2-1-title {
                margin-bottom: 1.5rem;
            }

            .footer-text-title-footer-2-1 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #000000;
            }

            .list-menu-footer-2-1 {
                color: #c7c7c7;
                text-decoration: none !important;
                cursor: pointer;
            }

            .list-menu-footer-2-1:hover {
                color: #555252;
            }

            hr.hr-footer-2-1 {
                margin: 0;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }

            .border-color-footer-2-1 {
                color: #c7c7c7;
            }

            .footer-link-footer-2-1 {
                margin-right: 1.25rem;
                color: #c7c7c7;
            }

            .footer-link-footer-2-1:hover {
                color: #555252;
                cursor: pointer;
            }

            .social-media-c-footer-2-1:hover circle,
            .social-media-p-footer-2-1:hover path {
                fill: #555252;
                cursor: pointer;
            }

            .footer-info-space-footer-2-1 {
                padding-top: 3rem;
            }

            .social-media-left-footer-2-1 {
                margin-right: 1.25rem;
            }

            .social-media-center-1-footer-2-1 {
                margin-right: 1.25rem;
            }

            .social-media-center-2-footer-2-1 {
                margin-right: 1.25rem;
            }

            .list-footer-footer-2-1 {
                padding: 5rem 1rem 6rem 1rem;
            }

            .info-footer-footer-2-1 {
                padding-left: 1rem;
                padding-right: 1rem;
                padding-bottom: 3rem;
            }

            @media (max-width: 980px) {
                .footer-responsive-space-footer-2-1 {
                    margin-bottom: 1.25rem;
                    margin-top: 1.25rem;
                }
            }

            @media (min-width: 576px) {
                .list-footer-footer-2-1 {
                    padding: 5rem 2rem 6rem 2rem;
                }

                .info-footer-footer-2-1 {
                    padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 3rem;
                }
            }

            @media (min-width: 768px) {
                .list-footer-footer-2-1 {
                    padding: 5rem 4rem 6rem 4rem;
                }

                .info-footer-footer-2-1 {
                    padding-left: 4rem;
                    padding-right: 4rem;
                    padding-bottom: 3rem;
                }
            }

            @media (min-width: 992px) {
                .list-footer-footer-2-1 {
                    padding: 5rem 6rem 6rem 6rem;
                }

                .info-footer-footer-2-1 {
                    padding-left: 6rem;
                    padding-right: 6rem;
                    padding-bottom: 3rem;
                }
            }
        </style>

        <div class="border-color-footer-2-1 info-footer-footer-2-1">
            <div class="">
                <hr class="hr-footer-2-1">
            </div>
            <div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space-footer-2-1">
                <div class="d-flex title-font font-medium align-items-center" style="cursor: pointer;">
                    <img src="{{ asset('elements/img/logo.png')}}" alt="UpVote-Logo">
                </div>
                <nav class="mx-auto d-flex flex-wrap align-items-center justify-content-center footer-responsive-space-footer-2-1">
                    <a class="footer-link-footer-2-1" style="text-decoration: none;">Terms of Service</a>
                    <span style="margin-right:1.25rem">|</span>
                    <a class="footer-link-footer-2-1" style="text-decoration: none;">Privacy Policy</a>
                    <span style="margin-right:1.25rem">|</span>
                    <a class="footer-link-footer-2-1" style="text-decoration: none;">Licenses</a>
                </nav>
                <nav class="d-flex flex-lg-row flex-column align-items-center justify-content-center">
                    <p style="margin: 0">{{$setting[0]->nama_instansi}}</p>
                </nav>
            </div>
        </div>
        </div>

    </section>
    @include('sweetalert::alert')
    <script src="{{ asset('elements/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>