@extends('layouts/base_view')
@section('title','Perizinan')
@section('content')
<!-- Main content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        {{-- untuk notif --}}
                        @include('layouts.partials.messages')
                        <div class="row">
                            <div class="col-md-1 mr">
                                <a href="{{ route('permissions.create') }}" class="btn btn-success btn-block"><i class="fa-solid fa-plus"></i> Buat</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPermissions" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col" width="15%">Sumber</th>
                                    <th scope="col" width="10%" class='Tcenter'>#</th>
                                </tr>
                            </thead>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td class="Tcenter">
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah {{$permission->name}}?">
                                        <i class="fas fa-edit btn-xs"></i>
                                    </a>
                                    <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-outline-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus {{$permission->name}}?">
                                        <i class="fas fa-remove btn-xs"></i>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                            <tfoot> </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
    $(function() {
        $("#tblPermissions").DataTable({
            "responsive": true,
            "lengthUbah": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblPermissions_wrapper .col-md-6:eq(0)');


    });
</script>

<script>


</script>
<!-- /.content -->
@endsection