@extends('layouts.app')

@section('content')

    <div class="container-md p-5" >
        <div class="pool">
            <div class="div d-flex flex-wrap justify-content-around">
            
                @foreach ($images as $image)
                <div class="div-photo">
                    <img src="{{$image->url}}" class="photo">
                </div>
                <div class="div-info">
                    <p>{{$image->name}}</p>
                    <a href="{{route('images.edit',  ["image"=>$image])}}">edit</a>
                    <a href="{{route('images.destroy',  ["image"=>$image])}}">delete</a>
                    <form action="{{ route('images.destroy', ["image"=>$image]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                    
                    

                @endforeach
            </div>
        </div>    
        
    </div>



@endsection