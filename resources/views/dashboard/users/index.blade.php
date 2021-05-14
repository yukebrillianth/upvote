@extends('vendor.adminLTE.master')

@section('title', 'Data Peserta')

@push('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Data Peserta</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Data Peserta</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <a class="btn btn-success" id="btnAdd" href="{{ Route('addPeserta') }}">Tambah Data</a>
    <button id="btndelall" class="btn btn-default ml-2"><i class="fas fa-trash"></i> Hapus Semua</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Nama Peserta</th>
          <th>E-Mail</th>
          <th>Kelas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{ $item["name"] }}</td>
          <td width="10%">{{ $item["email"] }}</td>
          @if (!$item->kelas)
          <td>Tanpa kelas</td>
          @elseif ($item->kelas->class_name)
          <td>{{ $item->kelas->class_name }}</td>
          @endif
          @if ($item["has_blacklisted"])
          <td><span class="badge badge-dark text-white">Diblacklist</span></td>
          @elseif (!$item["has_voted"])
          <td><span class="badge badge-warning">Belum Memilih</span></td>
          @elseif ($item["has_voted"])
          <td><span class="badge badge-success">Sudah Memilih</span></td>
          @endif
          <td>
            <a href="{{ Route('editPeserta', ['id' => $item->id]) }}" class="badge badge-success text-white" role="button">Ubah</a>
            <a href="#" class="badge badge-dark blacklistBtn text-white" id="blacklistBtn" data-id="{{ $item->id }}" role="button">Blacklist</a>
            <a href="#" class="badge badge-warning resetStatusBtn" id="resetStatusBtn" data-id="{{ $item->id }}" role="button">Reset Status</a>
            <a href="#" class="badge badge-danger btn-del text-white" id="singledel" data-id="{{ $item->id }}" role="button">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Nama Peserta</th>
          <th>E-Mail</th>
          <th>Kelas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<form id="deleteAll" method="POST">
  @method('DELETE')
  @csrf
</form>
<form id="delete" method="POST">
  @method('DELETE')
  @csrf
</form>
<form id="blacklist" method="POST">
  @method('PUT')
  @csrf
</form>
<form id="reset" method="POST">
  @method('PUT')
  @csrf
</form>
@endsection
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
      $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    });
</script>
<script>
  // Delete ALl Data
    $('#btndelall').click( function() {
      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#deleteAll").submit();
      }
    })
    });

    // Single Delete Data
    $('.btn-del').click( function() {
      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        const id = $(this).data("id");
        $("#delete").attr('action', 'peserta/'+id).submit();
      }
    })
    });

    // Blacklist
    $('.blacklistBtn').click( function() {
      Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Blacklist!'
    }).then((result) => {
      if (result.isConfirmed) {
        const id = $(this).data("id");
        $("#blacklist").attr('action', 'peserta/'+id).submit();
      }
    })
    });

    // Reset Status
    $('.resetStatusBtn').click( function() {
      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Reset!'
    }).then((result) => {
      if (result.isConfirmed) {
        const id = $(this).data("id");
        $("#reset").attr('action', 'peserta/reset/'+id).submit();
      }
    })
    });
</script>
@endpush