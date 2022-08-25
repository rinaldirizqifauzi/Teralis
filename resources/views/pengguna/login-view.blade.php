@extends('welcome')


@section('admin')
    <li><a href="{{ route('login') }}" class="active">Admin </a></li>
@endsection

<style>

</style>

@section('content')
@include('components.home.header')
<form method="POST" action="{{ route('postlogin') }}">
    @csrf
  <div class="login  animate__animated animate__jackInTheBox">
      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>

      <h2>Login Form</h2>
      {{-- Alert  --}}
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
            {{ session('success') }}
      </div>
      @endif

      {{-- Alert  --}}
      @if(session()->has('loginError'))
      <div class="alert alert-danger" role="alert">
            {{ session('loginError') }}
      </div>
      @endif

      {{-- Email --}}
      <div class="box-login">
        <i class="fas fa-envelope-open-text"></i>
        <input type="text" id="email" type="email"  name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Password --}}
    <div class="box-login">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

      <button type="submit" name="login" class="btn-login">Login</button>
      <div class="bottom">
        <a href="{{ route('registerpengguna') }}">Register</a>
      </div>
  </div>
</form>


@endsection
