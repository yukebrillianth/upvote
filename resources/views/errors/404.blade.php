<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link rel="shortcut icon" href="{{ asset('elements/img/logo.png')}}">
    <link href="{{ asset('elements/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
    <section style="height: 100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .main-empty-2-1 {
                padding-left: 2rem;
                padding-right: 2rem;
                padding-top: 4rem;
                padding-bottom: 2rem;
            }

            .main-img-empty-2-1 {
                object-fit: cover;
                object-position: center;
                margin-bottom: 3rem;
                width: 83.333333%;
            }

            .title-text-empty-2-1 {
                font-size: 1.875rem;
                line-height: 2.25rem;
                font-weight: 600;
                margin-bottom: 1.25rem;
            }

            .title-caption-empty-2-1 {
                margin-bottom: 4rem;
                letter-spacing: 0.025em;
                line-height: 1.75rem;
            }

            .btn-empty-2-1 {
                color: #FFFFFF;
                font-weight: 600;
                font-size: 1.125rem;
                line-height: 1.75rem;
                line-height: 1.75rem;
                padding: 1rem 1.5rem 1rem 1.5rem;
                border-radius: 0.75rem;
            }

            .btn-empty-2-1:hover {
                color: #FFFFFF;
                --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            @media(min-width: 425px) {
                .title-text-empty-2-1 {
                    font-size: 40px;
                }
            }

            @media (min-width: 576px) {
                .main-empty-2-1 {
                    padding-left: 2rem;
                    padding-right: 2rem;
                    padding-top: 5rem;
                    padding-bottom: 4rem;
                }

                .main-img-empty-2-1 {
                    margin-bottom: 4rem;
                    width: auto;
                }
            }

            @media (min-width: 768px) {
                .main-empty-2-1 {
                    padding-left: 4rem;
                    padding-right: 4rem;
                }

                .lg-show-empty-2-1 {
                    display: block;
                }

                .lg-hide-empty-2-1 {
                    display: none;
                }
            }

            @media (min-width: 992px) {
                .main-empty-2-1 {
                    padding-left: 6rem;
                    padding-right: 6rem;
                }
            }

            @media (max-width: 768px) {
                .lg-show-empty-2-1 {
                    display: none;
                }

                .lg-hide-empty-2-1 {
                    display: block;
                }
            }
        </style>
        <div class="main-empty-2-1 container mx-auto d-flex align-items-center justify-content-center flex-column" style="font-family: 'Poppins', sans-serif;">
            <img class="main-img-empty-2-1 img-fluid" src="{{ asset('elements/img/Empty-2-1.png')}}" alt="404">

            <div class="text-center w-100">
                <h1 class="title-text-empty-2-1" style="color: #272E35;">Opss! Something Missing</h1>
                <p class="lg-show-empty-2-1 title-caption-empty-2-1" style="color: #9C9C9C;">Halaman yang anda tuju tidak ditemukan. Kami<br>
                    menyarankan anda untuk kembali ke beranda.</p>
                <p class="lg-hide-empty-2-1 title-caption-empty-2-1" style="color: #9C9C9C;">Halaman yang anda tuju tidak ditemukan. Kami
                    menyarankan anda untuk kembali ke beranda.</p>
                <div class="d-flex justify-content-center">
                    <a href="{{URL::route('home')}}" class="btn btn-empty-2-1 d-inline-flex" style="background: #FF7C57;font-family: 'Poppins', sans-serif;">Kembali ke Beranda</a>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('elements/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>