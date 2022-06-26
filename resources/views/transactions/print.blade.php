<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">


</head>

<body class="hold-transition sidebar-mini">


    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- About Me Box -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bukti Transaksi</h3>
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

    </div>
    <script>
        window.print();
    </script>

</body>

</html>