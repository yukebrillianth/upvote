<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $setting[0]->nama_kegiatan }} | Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('elements/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
    <section style="height:100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF"></section>
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

        .modal-dialog .modal-content {
            border-radius: 8px;
            background-color: #FFFFFF;
            border: none;
        }

        .modal-data {
            padding: 10px;
        }

        .modal-footer {
            justify-content: center;
            align-items: center;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none;
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

        .btn-select {
            background-color: #FF7C57;
            border: none;
            border-radius: 0.5rem;
            width: 20%;
        }

        .btn-select:hover {
            background-color: #FF7C57;
            color: #FFFFFF;
            --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .btn-select:active,
        .btn-select:focus {
            background-color: #FF7C57;
        }

        .card-calon {
            border: 2px solid #E5EBF9;
            border-radius: 1rem;
            padding: 5px;
            transition: all 0.5s;
        }

        .candidate-name {
            font-weight: 600;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .cover {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            margin: 16px;
        }

        .modal-img {
            display: flex;
            justify-content: center;
        }

        .slogan-title {
            color: #999aa4;
            font-size: 16px;
            font-weight: 300;
            margin-top: -10px;
            margin: -10px 0 10px 0;
        }

        .slogan {
            font-size: 16px;
            font-weight: 300;
            font-style: italic;
        }

        .btn-vm {
            display: block;
            width: 100%;
            background-color: #FF7C57;
            border: none;
            border-radius: 1rem;
        }

        .btn-vm:hover {
            background-color: #FF7C57;
            color: #FFFFFF;
            --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .btn-vm:focus {
            background-color: #FF7C57;
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

            .modal-body .cover {
                max-width: 100% !important;
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

            .modal-body .cover {
                max-width: 100% !important;
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

            .modal-body .cover {
                max-width: 40% !important;
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
            <a>
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
                                <li class="nav-item">
                                    <a class="nav-link">Selamat datang, <b>{{Auth::user()->name}}!</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
                            <a href="/logout" class="btn btn-fill-header-4-1">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-4-1">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">Selamat datang, <b>{{Auth::user()->name}}!</b></a>
                    </li>
                </ul>
                <a href="/logout" class="btn btn-fill-header-4-1">Keluar</a>
            </div>
        </nav>

        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero-header-4-1">
                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card card-calon">
                            <img class="cover img-fluid" src="https://images.unsplash.com/photo-1504593811423-6dd665756598?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title candidate-name">1. Yuke Brilliant H.</h5>
                                <p class="slogan-title">Slogan :</p>
                                <p class="slogan">"Menjadi orang hebat adalah tujuan kami"</p>
                                <button type="button" class="btn btn-block btn-danger btn-vm" data-bs-toggle="modal" data-bs-target="#modalData">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-calon">
                            <img class="cover img-fluid" src="https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title candidate-name">2. Nashwa Zahira</h5>
                                <p class="slogan-title">Slogan :</p>
                                <p class="slogan">"Menjadi orang hebat adalah tujuan kami"</p>
                                <button type="button" class="btn btn-block btn-danger btn-vm" data-bs-toggle="modal" data-bs-target="#modalData">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-calon">
                            <img class="cover img-fluid" src="https://images.unsplash.com/photo-1494708001911-679f5d15a946?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title candidate-name">3. Maman Resing G.</h5>
                                <p class="slogan-title">Slogan :</p>
                                <p class="slogan">"Menjadi orang hebat adalah tujuan kami"</p>
                                <button type="button" class="btn btn-block btn-danger btn-vm" data-bs-toggle="modal" data-bs-target="#modalData">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-calon">
                            <img class="cover img-fluid" src="https://images.unsplash.com/photo-1530450736320-e7bb9d46b1b1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1374&q=80" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title candidate-name">4. Eréndira Tovar</h5>
                                <p class="slogan-title">Slogan :</p>
                                <p class="slogan">"Menjadi orang hebat adalah tujuan kami"</p>
                                <button type="button" class="btn btn-block btn-danger btn-vm" data-bs-toggle="modal" data-bs-target="#modalData">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>

    <!-- Footer -->
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
                    <p style="margin: 0">{{ $setting[0]->nama_instansi }}</p>
                </nav>
            </div>
        </div>
        </div>

    </section>

    <!-- Modal Data -->
    <div class="modal fade" id="modalData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content modal-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">1. Yuke Brilliant H.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-img">
                        <img class="cover img-fluid" src="https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top">
                    </div>
                    <h3>Visi</h3>
                    <p>Memajukan SMAN 1 Jakarta serta menjadikan OSIS sebagai wadah untuk menampung inspirasi, aspirasi, dan kreatifitas siswa-siswi SMAN Jakarta, dan juga membentuk kepribadian siswa-siswi yang sopan santun, berkarakter dan berbudaya</p>
                    <h3>Misi</h3>
                    <p>Merealisasikan atau mengaktifkan program kerja yang sebelumnya telah ada namun belum berjalan dengan lancar, kreatif dan inovatif, meningkatkan minat dan kreatifitas siswa melalui ekstrakurikuler untuk membentuk karakter yang aktif, menertibkan kembali peraturan yang sudah mulai longgar, meminimalisir anggapan senioritas, karena kakak kelas bukan ditakuti namun untuk disegani, dan meningkatkan peranan OSIS dalam kinerja dan kerjasama dalam rangka menciptakan kader-kader yang mampu menunjukkan identitas dan eksistensi baik dalam akademik dan non akademik.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-select">Pilih</button>
                    <!-- <button type="button" class="btn btn-tutup" data-bs-dismiss="modal">Tutup</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('elements/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>