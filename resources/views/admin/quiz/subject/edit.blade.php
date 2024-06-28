@extends('admin.body.dashboard')
@section('content')
<div class="card">
    <div class="card-header">Edit Grade</div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('subject.update',$subject->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">The Grade</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                            autocomplete="off" placeholder="Grade" value="{{ $subject->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
