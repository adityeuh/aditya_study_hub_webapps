@extends('layouts.base_view')
@section('title','Data Transaksi')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- About Me Box -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tentang Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Tanggal Transaksi</strong>
                                <p class="text-muted"> {{$transaction->date}} </p>
                            </div>
                            <div class="col-md-6"><strong>Harga Perbulan</strong>
                                <p class="text-muted">{{'Rp '.number_format($transaction->price,0,',','.')}}</p>
                            </div>
                            <div class="col-md-6"><strong>Kode Transaksi</strong>
                                <p class="text-muted">{{$transaction->code}}</p>
                            </div>
                            <div class="col-md-6"><strong>Diskon</strong>
                                <p class="text-muted">{{ 'Rp '.number_format($transaction->discount,0,',','.') }}</p>
                            </div>
                            <div class="col-md-6"><strong>Nama Kamar</strong>
                                <p class="text-muted">{{$transaction->room_name}}</p>
                            </div>
                            <div class="col-md-6"><strong>Total</strong>
                                <p class="text-muted">{{ 'Rp '.number_format($transaction->total,0,',','.') }}</p>
                            </div>
                            <div class="col-md-6"><strong>Nama Penghuni</strong>
                                <p class="text-muted">{{$transaction->customer_name}}</p>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6"><strong>No Telp</strong>
                                <p class="text-muted">{{$transaction->customer_phone}}</p>
                            </div>
                            <div class="col-md-6"><strong>Catatan</strong>
                                <p class="text-muted"><?= wordwrap($transaction->note, 75, "<br>\n") ?></p>
                            </div>
                            <div class="col-md-12 text-right">
                                <a href="{{ route('transactions.index') }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Daftar Transaksi">
                                    <i class="fa-solid fa-list"></i>
                                </a>                                
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah Transaksi">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('transactions.destroy', $transaction->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Hapus Transaksi">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <a href="{{ route('transactions.print', $transaction->id) }}" target="__blank" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Print Bukti Transaksi">
                                    <i class="fa-solid fa-print"></i>
                                </a>                                
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