@extends('layouts/base_view')
@section('title','Pengguna')
@section('content')
<!-- Main content -->
 
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat pengguna baru</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nama" required>
                                <label for="name">Nama</label>
                                @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('email') }}" type="email" class="form-control" name="email" placeholder="Email address" required>
                                <label for="email">Email</label>
                                @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('username') }}" type="text" class="form-control" name="username" placeholder="Username" required>
                                <label for="username">Username</label>
                                @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Kata sandi" required>
                                <label for="password">Kata sandi</label>
                            </div>
                            <div class="mb-3">
                                <code>peran bisa ditambahkan ketika pengguna sudah dibuat (ubah user)</code>
                                <select class="form-control" name="role">
                                    <option value="">Pilih peran</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-default">Kembali</a>
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