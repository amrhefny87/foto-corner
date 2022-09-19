@extends('layouts.app')

@section('content')

<div class="container welcome-container d-flex ">
    <img src="{{ asset('img/Intro.jpg') }}" class="image-intro-body" alt="Intro Image">
    <div class="image-intro-overlay d-flex flex-wrap justify-content-start align-items-center">
        <div class="image-intro-name">Foto Corner</div>
        <div class="image-intro-description mt-2">Take a picture, it will last longer</div>
    </div>
</div>

@endsection