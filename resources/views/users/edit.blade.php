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
                        <h3 class="card-title">Ubah user</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group form-floating mb-3">
                                <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Nama" required>
                                <label for="">Nama</label>
                                @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ $user->email }}" type="email" class="form-control" name="email" placeholder="Alamat email" required>
                                <label for="">Email</label>
                                @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input value="{{ $user->username }}" type="text" class="form-control" name="username" placeholder="Username" required>
                                <label for="">Username</label>
                                @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Ubah sandi">
                                <label for="">Ubah sandi</label>
                            </div>
                            <div class="mb-3">
                                <code class="text-warning">Peran harus diisi</code>
                                <select class="form-control" name="role" required>
                                    <option value="">Pilih peran</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) 
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="mb-3">
                                <div class="form-group"> 
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                            <label class="custom-file-label" for="gambar">Pilih gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <div class="drag-area">
                                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <header>Seret & Jatuhkan untuk unggah gambar</header>
                                    <br>
                                    <button onclick="pilihgambar()" type="button">Pilih gambar</button>
                                    <input name="gambarni" type="file" hidden>
                                </div>
                            </div> -->
                            <br>

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

<!-- <link rel="stylesheet" href="{{asset('assets/tambahan/upload-image.css')}}"> -->
<!-- <script src="{{asset('assets/tambahan/upload-image.js')}}"></script> -->
<script src="{{asset('assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
  </script>

@endsection