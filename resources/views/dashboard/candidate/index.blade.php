@extends('vendor.adminLTE.master')

@section('title', 'Data Kandidat')

@push('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Data Kandidat</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Kandidat</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-success" id="btnAdd" href="{{ Route('addKandidat') }}">Tambah Data</a>
        <button id="btndelall" class="btn btn-default ml-2"><i class="fas fa-trash"></i> Hapus Semua</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Kandidat</th>
                    <th>Foto Kandidat</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>kelas</th>
                    <th>Suara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item["nama_kandidat"] }}</td>
                    <td width="10%"><img src="{{ asset('storage/' . $item->image ) }}" width="70px" alt=""></td>
                    <td width="30%">{{ substr(strip_tags($item->visi), 0, 100) }}{{ strlen($item->visi ) > 100 ? "..." : "" }}</td>
                    <td width="30%">{{ substr(strip_tags($item->misi), 0, 100) }}{{ strlen($item->misi ) > 100 ? "..." : "" }}</td>
                    @if (!$item->kelas)
                    <td>Tanpa kelas</td>
                    @elseif ($item->kelas->class_name)
                    <td>{{ $item->kelas->class_name }}</td>
                    @endif
                    <td>{{ $item["jumlah_pemilih_count"] }}</td>
                    <td>
                        <a href="{{ Route('editKandidat', ['id' => $item->id]) }}" class="badge badge-success text-white" role="button">Ubah</a>
                        <a class="badge badge-danger btn-del text-white" id="singledel" onclick="singleDelete({{$item->id}})" role="button">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Kandidat</th>
                    <th>Foto Kandidat</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>kelas</th>
                    <th>Suara</th>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
  
    const singleDelete = (id) => {
        console.log(id)
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
        $("#delete").attr('action', 'kandidat/'+id).submit();
      }
    })
    }
  
  
</script>
@endpush