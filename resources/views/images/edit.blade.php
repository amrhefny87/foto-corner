@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-card mt-3">
                <div class="card-info d-flex flex-row">
                    <div class="card-photo">
                        <img src="{{ asset('img/blonde-photo.jpg') }}" class="image-intro-body" alt="Login Photo">
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <form class="form-input" method="POST" action="{{route('images.update', ["image"=>$image])}}">
                            @csrf
                            @method('PUT')

                            @include('images.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection