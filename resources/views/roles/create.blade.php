@extends('layouts/base_view')
@section('title','Peran')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat peran baru</h3>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="form-group form-floating mb-3">
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nama peran" required>
                                <label for="name">Nama peran</label>
                            </div>
                             
                            <label for="permissions" class="form-label">Tetapkan izin</label>
                            <div style="  width: 100%; height: 400px; overflow-y: scroll;">
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                        <th scope="col" width="20%">Nama</th>
                                        <th scope="col" width="1%">Sumber</th>
                                    </thead>

                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission'>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-default">Kembali</a>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if ($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked', false);
                });
            }

        });
    });
</script>
@endsection