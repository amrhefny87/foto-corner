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
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>{{$image->name}}</td>
                                                   
                            </tr>
                            <tr>
                                <td>Upload date</td> 
                                <td>{{$image->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection