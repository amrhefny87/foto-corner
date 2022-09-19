@extends('layouts.app')

@section('content')

    <div class="container-md p-5" >
        <div>
            <div class="">
            
                @foreach ($images as $image)
                    <img src="{{$image->url}}" class="div-photo">
                    <p>{{$image->name}}</p>
                    <a href="{{route('images.edit',  ["image"=>$image])}}">edit</a>
                    <a href="{{route('images.destroy',  ["image"=>$image])}}">delete</a>
                    <form action="{{ route('images.destroy', ["image"=>$image]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>

                @endforeach
            </div>
        </div>    
        
    </div>



@endsection