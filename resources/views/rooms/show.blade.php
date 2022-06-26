@extends('layouts.base_view')
@section('title','Data Kamar')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- About Me Box -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tentang Kamar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Kode</strong>
                                <p class="text-muted"> {{$room->code}} </p>
                            </div>
                            <div class="col-md-6"><strong>Harga Perbulan</strong>
                                <p class="text-muted">{{$room->price}}</p>
                            </div>
                            <div class="col-md-6"><strong>Nama</strong>
                                <p class="text-muted">{{$room->name}}</p>
                            </div>
                            <div class="col-md-6"><strong>Status</strong>
                                <p class="text-muted">{{$room->status}}</p>
                            </div>
                            <div class="col-md-6"><strong>Deskripsi</strong>
                                <p class="text-muted"><?= wordwrap($room->desc, 75, "<br>\n") ?></p>
                            </div>
                            <div class="col-md-12 text-right">
                                <a href="{{ route('rooms.index') }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Daftar Kamar">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <?php if ($room->status == 'KOSONG') { ?>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah Kamar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Hapus Kamar">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection