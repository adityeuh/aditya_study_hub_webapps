@extends('layouts/base_view')
@section('title','Peran')
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
                                <a href="{{ route('roles.create') }}" class="btn btn-success btn-block"><i class="fa-solid fa-plus"></i> Buat</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPeran" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Sumber</th>
                                    <th width="5%" class="Tcenter">#</th>
                                </tr>
                            </thead>
                            @foreach ($roles as $key => $role)
                            <tbody>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td class="Tcenter">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah {{$role->name}}?">
                                        <i class="fas fa-edit btn-xs"></i>
                                    </a>
                                </td>
                            </tbody>
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
        $("#tblPeran").DataTable({
            "responsive": true,
            "lengthUbah": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblPeran_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- /.content -->
@endsection