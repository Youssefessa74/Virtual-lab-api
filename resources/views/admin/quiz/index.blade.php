@extends('admin.body.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Questions</h1>
        </div>
        <div class="card-body">
            <a style="margin: 25px" class="btn btn-inverse-primary" href="{{ route('question.create') }}">Create</a>
            @if(count($questions) < 0 )
               <h5 style="text-align: center;">There is No Questions</h5>
            @else
               <div class="accordion" id="accordionExample">
                @foreach ($subjects as $subject)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="subject-heading{{ $subject->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#subject-collapse{{ $subject->id }}" aria-expanded="true" aria-controls="subject-collapse{{ $subject->id }}">
                                {{ $subject->name }}
                            </button>
                        </h2>
                        @if(count($subject->questions) < 0 )
                        <h5 style="text-align: center;">There is No Questions</h5>
                     @else
                     <div id="subject-collapse{{ $subject->id }}" class="accordion-collapse collapse" aria-labelledby="subject-heading{{ $subject->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($subject->questions as $question)
                                <li>
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $question->id }}" aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                        {{ $question->question }}
                                    </button>
                                    <div style="margin-top: 7px;margin-bottom: 7px" class="collapse" id="collapse{{ $question->id }}">
                                        <ul>
                                            @foreach ($question->answers as $answer)
                                            <li>
                                                <span style="{{ $answer->is_correct ? 'color: green;' : '' }}">{{ $answer->answer }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div>
                                            <a href="{{ route('question.edit',$question->id) }}"  class="btn btn-sm btn-inverse-primary" style="margin-right: 20px">Edit a Question</a>
                                            <form action="{{ route('question.delete', $question->id) }}"  method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-sm btn-inverse-danger" style="margin-right: 20px">Delete a Question</button>
                                            </form>
                                          </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
