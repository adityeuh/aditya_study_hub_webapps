 
<link rel="stylesheet" href="{{asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/adminlte/plugins/toastr/toastr.min.css')}}">
<script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/adminlte/plugins/toastr/toastr.min.js')}}"></script> 

@if(Session::get('success', false))
<?php $data = Session::get('success'); ?>
@if (is_array($data))
@foreach ($data as $msg)
<div class="alert alert-success" role="alert">
    <i class="fa fa-check"></i>
    {{ $msg }}
</div>
@endforeach
@else
<style>
    .swal-wide{
    width:850px !important;
}
</style>
<script>
    $(function() {
        toastr.success('{{ $data }}')
    });
</script>
@endif
@endif