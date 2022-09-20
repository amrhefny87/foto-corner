@extends('layouts.app')

@section('content')

    <div class="container-md p-5 d-flex flex-column justify-content-center" >

        @if(Session::has('message'))
        <div class="alert msg-alert alert-dismissible d-flex flex-column align-items-center justify-content-center text-white" style="width: 250px" role="alert">  
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(!empty($message))
        <div class="msg d-flex flex-column align-items-center justify-content-center my-2"> 
            <p class="text-white mt-2">{{$message}}</p>
        </div>
        @endif

        <div class="pool">
            <div class="div d-flex flex-wrap justify-content-around p-2">
            
                @foreach ($images as $image)
                <div class="image mt-2">
                    <img src="{{$image->url}}" class="image-body" alt="{{$image->url}}">
                    <div class="image-overlay d-flex flex-column align-items-center justify-content-center">
                        <div class="image-name">{{$image->name}}</div>
                        <div class="image-action d-flex flex-row">
                            <a class="m-1" href="{{route('images.edit',  ["image"=>$image])}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form class="image-form" action="{{ route('images.destroy', ["image"=>$image]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-white" onclick="return confirm('Are you sure you want to delete this photo?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <a class="m-1" href="{{route('images.show',  ["image"=>$image])}}">
                                <i class="bi bi-door-open-fill"></i>
                            </a>
                            
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>    
        
    </div>



@endsection