@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-card mt-3">
                <div class="card-info d-flex flex-row">
                    <div class="card-photo-show">
                        <img src="{{ $image->url }}" class="image-intro-body" alt="Login Photo">
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <p>{{$image->name}}</p>
                        <p>{{$image->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection