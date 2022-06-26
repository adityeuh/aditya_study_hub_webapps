@extends('layouts/base_view')
@section('title','Data Kamar')
@section('content')
<!-- Main content -->
 
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat kamar baru</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('rooms.store') }}">
                            @csrf
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nama Kamar" required>
                                <label for="name">Nama Kamar</label>
                                @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('price') }}" type="price" class="form-control" name="price" placeholder="Harga Perbulan" required>
                                <label for="price">Harga Perbulan</label>
                                @if ($errors->has('price'))
                                <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('desc') }}" type="text" class="form-control" name="desc" placeholder="Deskripsi" required>
                                <label for="desc">Deskripsi</label>
                                @if ($errors->has('desc'))
                                <span class="text-danger text-left">{{ $errors->first('desc') }}</span>
                                @endif
                            </div>
                            
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <a href="{{ route('rooms.index') }}" class="btn btn-default">Kembali</a>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection