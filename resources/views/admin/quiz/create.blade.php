@extends('admin.body.dashboard')
@section('content')
<div class="card">
    <div class="card-header">Manage Questions</div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create A new Question </h6>
                <form method="POST" action="{{ route('question.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Question</label>
                        <input type="text" name="question" class="form-control" id="exampleInputUsername1"
                            autocomplete="off" placeholder="Question">
                        @error('question')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <select class="form-control" name="subject_id" id="subject_id">
                            <option selected disabled value="">Choose The Subject</option>
                            @foreach ($subjects as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answers</label>
                        @for($i = 1; $i <= 4; $i++) <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct_answer" value="{{ $i }}">
                            <input type="text" name="answers[]" class="form-control" autocomplete="off"
                                placeholder="Answer {{ $i }}">
                            </div>
                            @error('answers.' . ($i - 1))
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @endfor
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
