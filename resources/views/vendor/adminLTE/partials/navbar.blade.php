<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    @php
    $mytime = Carbon\Carbon::now()->locale('id')->isoFormat('dddd, LL');
    @endphp
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <span class="text-muted nav-link">Senin, 12 April 2021</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">
                <span class="btn btn-sm btn-danger" style="margin-top: -5px;"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp; Keluar</span>
            </a>
        </li>
    </ul>
</nav>