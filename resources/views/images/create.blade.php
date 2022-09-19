@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-special-black">
                <div class="card-header">New Photo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('imageStore') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Photo Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">Image url</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control " name="url"  required>

                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-light">
                                    Add Image
                                </button>
                                <button type="submit" class="btn btn-outline-danger">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection