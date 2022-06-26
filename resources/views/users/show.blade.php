@extends('layouts.base_view')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="callout callout-success">
            <h6>
                <p id="textWelcome"></p>
            </h6>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="{{asset('images/'.$user->url_img)}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->email}}</p>

                        <a href="{{ route('users.index') }}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="right" title="Daftar pengguna"><i class="fa-solid fa-list"></i> </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="right" title="Ubah" ><i class="fa-solid fa-pen-to-square"></i> </a>
                        <?php if ($logged_user_id != $user->id) { ?>
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-warning btn-block" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa-solid fa-trash-can"></i></a>
                        <?php } ?>
                        <a href="{{ route('logout.perform') }}" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="right" title="Keluar"><i class="fa-solid fa-power-off"></i></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tentang Pengguna</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <strong><i class="fas fa-user mr-1"></i> Nama</strong>
                                <p class="text-muted">
                                    {{$user->name}}
                                </p>
                            </div>
                            <div class="col-md-3"><strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                <p class="text-muted">{{$user->email}}</p>
                            </div>
                            <div class="col-md-3"><strong><i class="fas fa-user mr-1"></i> Username</strong>
                                <p class="text-muted">{{$user->username}}</p>
                            </div>
                            <div class="col-md-3"><strong><i class="fa-solid fa-user-gear mr-1"></i> Peran</strong>
                                <p class="text-muted">{{$role}}</p>
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

<script>
   
    var i = 0;
    var txt = 'Hi {{$logged_name}}, tetap fokus dan selesaikan ya!                    ';
    var speed = 150;
    typeWriter();

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("textWelcome").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        } else {
            i = 0;
            document.getElementById("textWelcome").innerHTML = '';
            document.getElementById("textWelcome").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
</script>

@endsection