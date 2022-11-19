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
    <div class="btn-group">
      <a href="{{ Route('addPeserta') }}" class="btn btn-success">Tambah Data</a>
      <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown"
        aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu" role="menu" style="">
        <a class="dropdown-item" id="btnImport" href="#">Import Excel</a>
        <button type="button" class="dropdown-item" id="btnDownload" href="#">Download Template Excel</button>
      </div>
    </div>
    <button id="btnExport" class="btn btn-info ml-2"><i class="far fa-file-excel"></i>&nbsp; Export Excel</button>
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
            <a href="{{ Route('editPeserta', ['id' => $item->id]) }}" class="badge badge-success text-white"
              role="button">Ubah</a>
            <a href="#" class="badge badge-dark blacklistBtn text-white" id="blacklistBtn" data-id="{{ $item->id }}"
              role="button">Blacklist</a>
            <a href="#" class="badge badge-warning resetStatusBtn" id="resetStatusBtn" data-id="{{ $item->id }}"
              role="button">Reset Status</a>
            <a href="#" class="badge badge-danger btn-del text-white" id="singledel" data-id="{{ $item->id }}"
              role="button">Hapus</a>
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
<script src="{{ asset('js/jquery.fileDownload.js') }}"></script>

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

    /* 
    * Export all user data to excel file 
    * Send request to export endpoint without CSRF protection
    */

   $('#btnExport').click( () => {
      $.fileDownload('{{route("exportPeserta")}}');
   }); // Selector

   /* 
    * Upload User File
    * Upload File, then store to upload endpoint
    */
   $('#btnImport').click(() => {
    Swal.fire({
      title: 'Pilih File',
      input: 'file',
      inputAttributes: {
        'accept': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'aria-label': 'Upload File Excel'
      }
    }).then((file) => {
        if (file.value) {
            var formData = new FormData();
            var file = $('.swal2-file')[0].files[0];
            formData.append("file", file);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                method: 'post',
                url: '{{route("importPeserta")}}',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: () => {
                  swal.fire({
                      title:"", 
                      text:"Loading...",
                      imageUrl: 'https://www.boasnotas.com/img/loading2.gif',
                      imageHeight: 200,
                      showCancelButton: false,
                      showConfirmButton: false,
                      closeOnClickOutside: false,
                  });
                },
                success: (res) => {
                    uploading = false;
                    Swal.close()
                    Swal.fire('Uploaded', 'Your file have been uploaded', 'success').then(() => {
                      location.reload();
                    });
                    Swal.hideLoading();
                },
                error: (err) => {
                    uploading = false;
                    Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    Swal.hideLoading();
                }
            })
        }
    }) // Swal
   }) // Selector

   /* 
    * Download User Import Template
    */
    $('#btnDownload').click( () => {
      $.fileDownload('/template/Template%20Import%20Peserta%202021.xlsx');
   }); // Selector
</script>
@endpush