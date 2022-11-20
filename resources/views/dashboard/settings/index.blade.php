@extends('vendor.adminLTE.master')

@section('title', 'Data Peserta')

@push('style')
<!-- DataTables -->
@endpush

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Settings</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengaturan Dasar</h3>
            </div>
            <form method="POST" role="form" action="{{route('storeSettings')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="namaInstansi">Nama Instansi</label>
                        <input type="text" class="form-control @error('nama_instansi') is-invalid @enderror"
                            id="namaInstansi" name="nama_instansi"
                            value="{{ old('nama_instansi') ?? $data[0]->nama_instansi}}"
                            placeholder="Masukkan nama instansi">
                        @error('nama_instansi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            id="namaKegiatan" name="nama_kegiatan"
                            value="{{old('nama_kegiatan') ?? $data[0]->nama_kegiatan}}"
                            placeholder="Masukkan nama kegiatan">
                        @error('nama_kegiatan')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode"
                            name="periode" value="{{old('periode') ?? $data[0]->periode}}"
                            placeholder="Masukkan periode kegiatan">
                        @error('periode')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="activeSwitch"
                                @if($data[0]->active === 1)checked @endif value="{{$data[0]->active}}">
                            <label class="custom-control-label" for="activeSwitch">Kegiatan Aktif</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
            </div>
            <form method="POST" role="form" action="{{route('changePassword')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="current_password">Password saat ini</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="current_password" name="current_password" placeholder="Masukkan password saat ini">
                        @error('current_password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            id="new_password" name="new_password" placeholder="Masukkan password baru">
                        @error('new_password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_confirm_password">Konfirmasi password</label>
                        <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror"
                            id="new_confirm_password" name="new_confirm_password"
                            placeholder="Masukkan konfirmasi password">
                        @error('new_confirm_password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script>
    const activeSwitch = $('#activeSwitch');

    activeSwitch.click(() => {
        $.ajax({
            type: 'POST',
            url: "{{route('storeSettingsStatus')}}",
            data: {
                '_token': "{{ csrf_token() }}",
                'active': +activeSwitch.prop('checked')
            },
            dataType: 'json',
        });
    });
</script>
@endpush