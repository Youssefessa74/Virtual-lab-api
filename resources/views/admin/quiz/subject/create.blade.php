@extends('admin.body.dashboard')
@section('content')
    <div class="card">

        <div class="card-header">Manage Users</div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Create A new Element </h6>

                    <form method="POST" action="{{ route('subject.store') }}" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Element</label>
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="name">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                        <button type="submit" class="btn btn-primary me-2">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

