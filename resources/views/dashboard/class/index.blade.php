@extends('vendor.adminLTE.master')

@section('title', 'Data Kelas')

@push('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('header')
<div class="row mb-2" id="header">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Kelas</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Kelas</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" id="btnAdd">Tambah Data</button>
                <button id="btndelall" class="btn btn-default ml-2"><i class="fas fa-trash"></i> Hapus Semua</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Id</th>
                            <th>Jumlah Kandidat</th>
                            <th>Jumlah Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->class_name}}</td>
                            <th>{{$item->id}}</th>
                            <th>{{$item->candidate->count()}}</th>
                            <th>{{$item->participant->count()}}</th>
                            <td>
                                <a id="{{$item->id}}" data-id="{{$item->id}}" class="badge badge-success text-white" role="button">Ubah</a>
                                <a href="#" class="badge badge-danger btn-del text-white" id="singledel" data-id="{{ $item->id }}" role="button">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Id</th>
                            <th>Jumlah Kandidat</th>
                            <th>Jumlah Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<form id="deleteAll" method="POST">
    @method('DELETE')
    @csrf
</form>
<form id="delete" method="POST">
    @method('DELETE')
    @csrf
</form>
<form id="add" action="{{URL::route('storeKelas')}}" method="POST">
    <input type="text" class="d-none" name="class_name" id="className">
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
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script>
    $(function () {
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
    // Add button
    $('#btnAdd').click( function() {
        Swal.fire({
        title: 'Masukkan nama kelas',
        input: 'text',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
            return 'Nama harus diisi! '
            }
        }
        }).then((value) => {
            if(value["value"]) {
                $("#className").val(value["value"])
                $("#add").submit()
            }
        })
    });
    // Edit Button
    $(".badge-success").click(function() {
        const id = $(this).attr('id'); // $(this) refers to button that was clicked
        const token = "{{ csrf_token() }}"
        $.ajax({
            type: 'GET',
            url: "kelas/edit/"+id,
            success: function (res) {
                Swal.fire({
                title: 'Edit nama kelas',
                input: 'text',
                showCancelButton: true,
                inputValue: res[0],
                inputAttributes: {
                    maxlength: 45,
                    minlength: 2,
                },
                inputValidator: (value) => {
                    if (!value) {
                    return 'Nama harus diisi'
                    }
                }
            }).then((value) => {
                if(value["value"]) {
                    if(value["value"] != res[0])
                    $.ajax({
                        type: 'PUT',
                        url: 'kelas/edit/'+id,
                        data: {
                            _token: token,
                            class_name: value["value"]
                        },
                        success: function (res) {
                            Swal.fire({
                                title: res,
                                icon: 'success',
                                confirmButtonText: 'ok'
                            }).then(() => {
                                location.reload();
                            })
                        },
                        error: function (err) {
                            Swal.fire({
                                title: err.responseJSON.errors.class_name[0],
                                icon: 'error',
                                confirmButtonText: 'ok'
                            })
                        }
                    })
                }
            })
            },
            error: function (res) {
                    console.log(res)
            }
        });
    });
    // Delete All Button
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
    // Delete Button
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
        $("#delete").attr('action', 'kelas/'+id).submit();
      }
    })
    });
</script>
@endpush