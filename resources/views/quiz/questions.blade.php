<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Welcome To Lab_Nerd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend-files')}}/CSS/index.css">
    <link rel="stylesheet" href="{{asset('frontend-files')}}/CSS/quiz.css">


</head>

<body>

    <!-- logo -->
    <div style="float:left">

        <div style="margin: 12px 25px;" class="logo">
            <img src="./images/logo.png">
            <p style="margin-left:20px ;color:rgba(11, 140, 170, 0.74);font-size: 30px;"><b> Lab_Nerd</b></p>
        </div>
    </div>
    <!-- navbar -->
    <div style=  "margin-top: 2rem; float:right"  class="topnav">
    <b>
         <a href="Welcome.html"> Welcome </a>
        <a href="./About2.html">About</a>
        <a href="./Chemical.html"> Chemical reaction </a>
        <a href="./Experiment.html"> Experiment </a>
        <a href="./Quiz.html"> Quiz </a>
    </b>


        <div class="dropdown">
            <a><i style="color:rgba(134, 8, 8, 0.76)" class="fa fa-fw fa-user"></i><b>User</b>
                <div class="dropdown-content">
                    <a href="./MyProfile.html">MyProfile</a>
                    <a href="./front-end-1-main/login.html">LogOut</a>

                </div>
                </a>
        </div>
        </div>





<main>
    <div class="container">
        <div class="quiz">
            <form action="{{ route('submit') }}" method="POST">
                @csrf
            <!-- Questions and Answers Loop -->
            @foreach ($questions as $index => $item)
                <div class="question_container">
                    <h4>{{ $item->question }}</h4>
                    <input type="hidden" name="question_{{ $item->id }}" value="{{ $item->id }}">
                    <div class="answers">
                        @foreach ($item->answers as $answer)
                            <label class="answer_label">
                                <input type="radio" name="answer_{{ $item->id }}" value="{{ $answer->id }}">
                                {{ $answer->answer }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button type="submit">Submit</button>
        </form>
            <!-- Next Button -->
            <div class="buttons">
                <div class="row">
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle next button click event
        document.getElementById('nextButton').addEventListener('click', function() {
            var currentQuestion = document.querySelector('.question_container[style="display: block"]');
            var nextQuestion = currentQuestion.nextElementSibling;

            if (nextQuestion !== null) {
                currentQuestion.style.display = 'none';
                nextQuestion.style.display = 'block';
            } else {
                // If there are no more questions, you can handle this scenario
                // For example, submit the quiz or display a message
                alert('End of the quiz!');
            }
        });
    </script>
</main>

</body>

</html>
