
@extends('layouts/base_view')
@section('title','Pengguna')
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
                                <a href="{{ route('users.create') }}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Buat Baru"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblUsers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th scope="col" width="5%" class='Tcenter'>Peran</th>
                                    <th scope="col" width="10%" class='Tcenter'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td class="Tcenter">
                                        @foreach($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                   
                                    <td class="Tcenter">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah {{$user->name}}?">
                                        <i class="fas fa-edit btn-xs"></i>
                                    </a>&nbsp;
                                        <a href="{{ route('users.destroy', $user->id) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus {{$user->name}}?">
                                        <i class="fas fa-remove btn-xs"></i>
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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

<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
 
    $(function() {
        $("#tblUsers").DataTable({
            "responsive": true,
            "lengthUbah": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblUsers_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- /.content -->
@endsection