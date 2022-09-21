@extends('layouts.app')

@section('content')
<div class="container welcome-container d-flex ">
    <img src="{{ asset('img/Intro.jpg') }}" class="image-intro-body" alt="Intro Image">
    <div class="image-intro-overlay d-flex flex-wrap justify-content-start align-items-center">
            <img class="image-intro-name" src="{{ asset('img/Logo-intro.png') }}" alt="Intro Logo">
    </div>
</div>
@endsection