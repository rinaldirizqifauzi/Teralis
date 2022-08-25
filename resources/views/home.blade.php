@extends('welcome')

@section('title')
    Teralis Jendela
@endsection

@section('get_started')
    <li><a href="/beranda" class="getstarted">Get Started</a></li>
@endsection


@section('carousel')
    @include('components.home.carousel')
@endsection

@section('contact')
    @include('components.home.contact')

@endsection

{{-- @section('get_started')
    <li><a href="{{ route('blog.home') }}" class="getstarted">Get Started</a></li>
@endsection --}}
{{--
@section('kode-pemesanan')
    <li><a href="{{ route('blog.post.search') }}" class="active">Kode Pemesanan</a></li>
@endsection --}}


@section('client')
    @include('components.home.client')
@endsection
