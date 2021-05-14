@extends('vendor.adminLTE.master')

@section('title', 'Tambah Data Peserta')

@section('header')
<div class="row mb-2" id="header">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Data Peserta</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('peserta') }}">Data Peserta</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid" id="content">
    <div class="card card-deafult">
        <!-- form start -->
        <form role="form" method="POST" action="{{ Route('storePeserta') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama_peserta">Nama Peserta</label>
                            <input type="text" name="nama_peserta" id="nama_peserta" class="form-control @error('nama_peserta') is-invalid @enderror" value="{{ old('nama_peserta') }}" placeholder="Masukkan nama peserta" required autofocus>
                            @error('nama_peserta')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" value="{{ old('kelas_id') }}">
                                <option disabled selected>Pilih kelas</option>
                                @foreach ($class as $item)
                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="email_peserta">Email (token)</label>
                        <div class="input-group mb-3">
                            <input type="text" name="email_peserta" id="email_peserta" class="form-control @error('email_peserta') is-invalid @enderror" value="{{ str_replace('@up.vote', ' ', old('email_peserta')) }}" placeholder="Masukkan email peserta" required autofocus aria-label="Email" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@up.vote</span>
                            </div>
                        </div>
                        @error('email_peserta')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan email peserta" required autofocus>
                            @error('password')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@push('scripts')
<script src="{{ asset('tinymce/tinymce.min.js') }}" id="script"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        setup: function(editor) {
            editor.on('change', function(e) {
                editor.save();
            });
        }
    });
</script>
<script src="{{ asset('adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endpush