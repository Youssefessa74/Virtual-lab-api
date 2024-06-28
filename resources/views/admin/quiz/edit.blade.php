@extends('admin.body.dashboard')
@section('content')
<div class="card">
    <div class="card-header">Edit Question</div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Question</h6>
                <form method="POST" action="{{ route('question.update',$question->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Question</label>
                        <input type="text" name="question" class="form-control" id="exampleInputUsername1"
                            autocomplete="off" placeholder="Question" value="{{ $question->question }}">
                        @error('question')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <select class="form-control" name="subject_id" id="subject_id">
                            <option selected disabled value="">Choose The Subject</option>
                            @foreach ($subject as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $question->subject_id)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answers</label>
                        @foreach ($question->answers as $key => $answer)
                        <div class="form-check">
                            <input class="form-check-input" @checked($answer->is_correct == 1)  type="radio" name="correct_answer" value="{{ $key + 1 }}" >
                            <input type="text" name="answers[]" class="form-control" autocomplete="off"
                                placeholder="Answer {{ $key + 1 }}" value="{{ $answer->answer }}">
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
