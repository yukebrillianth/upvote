@extends('vendor.adminLTE.master')

@section('title', 'Edit Data Kandidat')

@section('header')
<div class="row mb-2" id="header">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ubah Data Kandidat</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kandidat') }}">Data Kandidat</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid" id="content">
    <div class="card card-deafult">
        <!-- form start -->
        <form role="form" method="POST" action="{{ Route('putKandidat', ['id' => $data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Kandidat</label>
                            <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control @error('nama_kandidat') is-invalid @enderror" value="{{old('nama_kandidat') == null ? $data->nama_kandidat : old('nama_kandidat') }}" placeholder="Masukkan nama kandidat" required autofocus>
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
                            <select class="form-control @error('class_id') is-invalid @enderror" name="class_id" required>
                                <option disabled>Pilih kelas</option>
                                @foreach ($class as $item)
                                <option {{$data == $item->class_name ? "selected" : ""}} value="{{ $item->id }}">
                                    {{ $item->class_name }}</option>
                                @endforeach
                            </select>
                            @error('class_id')
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
                            <textarea class="form-control  @error('visi') is-invalid @enderror" rows="3" id="visi" name="visi" pellcheck="false" required>{!! old('nama_kandidat') == null ? $data->visi : old('visi') !!}</textarea>
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
                            <textarea class="form-control  @error('misi') is-invalid @enderror" rows="3" id="misi" name="misi" spellcheck=" false" required>{!! old('nama_kandidat') == null ? $data->misi : old('misi') !!}</textarea>
                            @error('misi')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-1">
                            <figure class="figure {{ isset($data->image) ? "" : "d-none" }}">
                                <img src="{{ isset($data->image) ? asset('storage/' . $data->image ) : "" }}" class="figure-img img-fluid rounded w-100" alt="foto {{$data->image}}">
                                <figcaption class="figure-caption">Foto Kandidat</figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-11">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            <small>Format png, jpg, jpeg !</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
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