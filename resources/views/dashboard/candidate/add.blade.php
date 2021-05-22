@extends('vendor.adminLTE.master')

@section('title', 'Tambah Data Kandidat')

@section('header')
<div class="row mb-2" id="header">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Data Kandidat</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kandidat') }}">Data Kandidat</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid" id="content">
    <div class="card card-deafult">
        <!-- form start -->
        <form role="form" method="POST" action="{{ Route('storeKandidat') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Kandidat</label>
                            <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control @error('nama_kandidat') is-invalid @enderror" value="{{ old('nama_kandidat') }}" placeholder="Masukkan nama kandidat" required autofocus>
                            @error('nama_kandidat')
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
                                <option {{ old('kelas_id') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Visi</label>
                            <textarea class="form-control  @error('visi') is-invalid @enderror" rows="3" name="visi" pellcheck="false" required>{{ old('visi') }}</textarea>
                            @error('visi')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Misi</label>
                            <textarea class="form-control  @error('misi') is-invalid @enderror" rows="3" name="misi" spellcheck=" false" required>{{ old('misi') }}</textarea>
                            @error('misi')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Slogan</label>
                    <input type="text" name="slogan" id="slogan" class="form-control @error('slogan') is-invalid @enderror" value="{{ old('slogan') }}" placeholder="Masukkan slogan kandidat" required autofocus>
                    @error('slogan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" name="image" required>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                    <small>Format png, jpg, jpeg !</small>
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