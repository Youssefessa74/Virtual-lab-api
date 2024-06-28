@extends('admin.body.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">Edit Element</div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Element</h6>
                    <form method="POST" action="{{ route('element.update', $element->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="name" value="{{ $element->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">symbol</label>
                            <input type="text" name="symbol" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="symbol" value="{{ $element->symbol }}">
                            @error('symbol')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">atomic number</label>
                            <input type="text" name="atomic_number" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="atomic number" value="{{ $element->atomic_number }}">
                            @error('atomic_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="description" value="{{ $element->description }}">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Image Url</label>
                            <input type="text" name="image_url" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Image Url" value="{{ $element->image_url }}">
                            @error('image_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
