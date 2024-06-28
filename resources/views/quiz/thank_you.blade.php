<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend-files')}}/CSS/index.css">
    <link rel="stylesheet" href="{{asset('frontend-files')}}/CSS/quiz.css">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .answer {
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        label.correct {
            color: green;
            font-weight: bold;
        }

        label.incorrect {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Quiz Results</h1>

        @foreach($questions as $question)
        <div class="question">
            <h2>{{ $question->question }}</h2>
            @foreach($question->answers as $answer)
            <div class="answer">
                <input type="radio" name="question_{{ $question->id }}" value="{{ $answer->id }}" {{ $answer->id == $userResponses[$question->id] ? 'checked' : '' }} disabled>
                <label class="{{ $answer->id == $userResponses[$question->id] ? ($answer->is_correct ? 'correct' : 'incorrect') : '' }}">
                    {{ $answer->answer }}
                    @if($answer->is_correct)
                    <label class="correct" >(Correct)</label>
                    @endif
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</body>

</html>
