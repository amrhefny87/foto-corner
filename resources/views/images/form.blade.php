<div class="container-fluid text-white">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Photo Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name"  value="@if(isset($image->name)){{$image->name}} @endif" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="url" class="col-md-4 col-form-label text-md-right">Image url</label>
        <div class="col-md-6">
            <input type="text" class="form-control " name="url"  value="@if(isset($image->url)){{$image->url}} @endif" required>
        </div>
    </div>

    <div class="form-group row mt-2">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-outline-light">
                Save
            </button>
            <button type="submit" class="btn btn-outline-danger">
                Cancel
            </button>
        </div>
    </div>
</div>
