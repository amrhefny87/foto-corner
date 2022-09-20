@extends('layouts.app')

@section('content')

    <div class="container-md p-5" >
        <div class="pool">
            <div class="div d-flex flex-wrap justify-content-around p-2">
            
                @foreach ($images as $image)
                <div class="image mt-2">
                    <img src="{{$image->url}}" class="image-body" alt="{{$image->url}}">
                    <div class="image-overlay d-flex flex-column align-items-center justify-content-center">
                        <div class="image-name">{{$image->name}}</div>
                        <div class="image-action d-flex flex-row">
                            <a class="m-1" href="{{route('images.edit',  ["image"=>$image])}}">edit</a>
                            <a class="m-1" href="{{route('images.destroy',  ["image"=>$image])}}">delete</a>
                            <form class="image-form" action="{{ route('images.destroy', ["image"=>$image]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>    
        
    </div>



@endsection