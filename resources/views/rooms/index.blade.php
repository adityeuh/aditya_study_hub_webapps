
@extends('layouts/base_view')
@section('title','Data Kamar')
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
                                <a href="{{ route('rooms.create') }}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Buat Baru"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblRooms" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Kode Kamar</th>
                                    <th>Nama Kamar</th>
                                    <th>Harga Bulanan</th>
                                    <th>Status</th>
                                    <th scope="col" width="10%" class='Tcenter'>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $key => $room)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{ route('rooms.show', $room->id) }}">{{ $room->code }}</a></td>
                                    <td>{{ $room->name }}</td>
                                     <td>{{ 'Rp '.number_format($room->price,0,',','.') }}</td> 
                                    <td>{{ $room->status }}</td> 
                                   
                                    <td class="Tcenter">
                                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-outline-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah {{$room->name}}?">
                                        <i class="fas fa-edit btn-xs"></i>
                                    </a>&nbsp;
                                        <a href="{{ route('rooms.destroy', $room->id) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus {{$room->name}}?">
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
        $("#tblRooms").DataTable({
            "responsive": true,
            "lengthUbah": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblRooms_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- /.content -->
@endsection