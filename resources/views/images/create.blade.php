@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-special-black">
                <div class="card-header">New Photo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('images.store') }}">
                        @csrf

                        @include('images.form');
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection