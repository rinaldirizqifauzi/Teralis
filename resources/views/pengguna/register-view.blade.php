@extends('welcome')

@section('content')
@include('components.home.header')

<form method="POST" action="{{ route('registerpengguna.store') }}">
    @csrf
  <div class="login  animate__animated animate__jackInTheBox">
      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>

      <h2>Register Form</h2>

      {{-- Name --}}
      <div class="box-login">
        <i class="fas fa-envelope-open-text"></i>
        <input type="text" id="name" type="name"  name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Email --}}
      <div class="box-login">
        <i class="fas fa-envelope-open-text"></i>
        <input type="email" id="email" type="email"  name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="email">
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

      <button type="submit" name="login" class="btn-login">Registrasi</button>
      <div class="bottom">
        <a href="{{ route('loginpengguna') }}">login</a>
      </div>
  </div>
</form>

<p class="text animate__animated animate__fadeIn  animate__delay-1s"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ipsa inventore aperiam debitis, placeat explicabo nobis quasi! Voluptatem qui veritatis, id iusto illo laborum dolore. Laudantium nobis officiis quam reiciendis?</p>
@endsection
