
@extends('layouts/base_view')
@section('title','Perizinan')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat perizinan baru</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('permissions.store') }}">
                            @csrf
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nama izin" required>
                                <label for="name">Nama peran</label>
                            
                                @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-default">Kembali</a>
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