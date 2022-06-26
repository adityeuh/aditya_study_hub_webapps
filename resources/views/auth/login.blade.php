<?php
$error3 = false;
if (Session::get('noready')) {
    $error3 = Session::get('noready');
}
$error1 = false;
$error2 = false;
if ($errors->getBag('default')->first()) {
    if ($errors->getBag('default')->first() == 88) {
        $error1 = 'Username atau Email tidak ditemukan!';
    } else {
        $error2 = 'Kata sandi yang dimasukan salah!';
    }
}  ?>
@extends('layouts.auth-master')

@section('content')
<form method="post" action="{{ route('login.perform') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <img class="mb-4" src="{!! url('images/logo/kelolakos2.png') !!}" alt="" width="auto" height="57">
    
    
    <h1 class="h3 mb-3 fw-normal">Login</h1>
    
    @if($error3)
    <div class="form-group form-floating mb-3">
        <span class="text-danger text-left">{{ $error3 }}</span>
    </div>
    @endif
    
    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="username" value="{{ Session::get('username') }}" placeholder="Username" required="required" autofocus>
        <label for="floatingName">Email or Username</label>
        @if ($error1)
        <span class="text-danger text-left">{{ $error1 }}</span>
        @endif
    </div>
    
    <div class="form-group form-floating mb-3">
        <input type="password" class="form-control" name="password" value="{{ Session::get('password') }}" placeholder="Password" required="required">
        <label for="floatingPassword">Password</label>
        @if ($error2)
        <span class="text-danger text-left">{{ $error2 }}</span>
        @endif
    </div>
    
    <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
    
    @include('auth.partials.copy')
    <img class="mb-4" src="{!! url('images/logo/logo-adityagroup1.png') !!}" alt="" width="auto" height="57">
</form>
@endsection