@extends('dashboard')
@section('content')
    <div>quiz{{ $quiz->name }}</div>
        <br>
        <div>
            <h1 id="current_question"></h1>
            <h3 id="points"></h3>
            <hr>
            <h1 id="question"></h1>
            <img id="question_img" style="width:300px; height:300px;">
            
            <input name="answer" type="radio" id="answer_1"></input>
            <label for="answer_1" id="answer_1_label">a1</label><br>
            <input name="answer" type="radio" id="answer_2"></input>
            <label for="answer_2" id="answer_2_label">a2</label><br>
            <input name="answer" type="radio" id="answer_3"></input>
            <label for="answer_3" id="answer_3_label">a3</label><br>
            <input name="answer" type="radio" id="answer_4"></input>
            <label for="answer_4" id="answer_4_label">a4</label><br>
            <br>
            <input type="button" name="" id="btnanswer" class="btn btn-primary" role="button" onclick="answer()" value="Answer">
            <input type="button" name="" id="btnnext" class="btn btn-success" role="button" onclick="nextQuestion()" value="Next">

        </div>


    <script>
        questions = {!! json_encode($questions) !!};

        var currentQuestion = 0
        var points = 0
        var currentQuestionAnswered = false

        function setQuestion(questionNum){
            currentQuestionAnswered = false
            document.getElementById("current_question").innerHTML = "Question - " + (questionNum+1) + "/" + (questions.length)
            document.getElementById("points").innerHTML = "points - " + points

            document.getElementById("question").innerHTML = questions[questionNum].question
            document.getElementById("question_img").src = questions[questionNum].imgUrl
        
            document.getElementById("answer_1_label").innerHTML = questions[questionNum].ans1
            document.getElementById("answer_2_label").innerHTML = questions[questionNum].ans2
            document.getElementById("answer_3_label").innerHTML = questions[questionNum].ans3
            document.getElementById("answer_4_label").innerHTML = questions[questionNum].ans4

            document.getElementById("answer_1").checked = false
            document.getElementById("answer_2").checked = false
            document.getElementById("answer_3").checked = false
            document.getElementById("answer_4").checked = false
        }

        setQuestion(currentQuestion)

        function getSelectedAnswer(){
            if(document.getElementById("answer_1").checked) return 0
            else if(document.getElementById("answer_2").checked) return 1
            else if(document.getElementById("answer_3").checked) return 2
            else if(document.getElementById("answer_4").checked) return 3
            return 0
        }

        function nextQuestion(){
            if(currentQuestionAnswered){
                currentQuestion++
                setQuestion(currentQuestion)
            }else{
                alert("Answer question!")
            }
        }

        async function answer() {
            var answer = getSelectedAnswer()
            console.log(answer)

            try {

                const response = await axios.post('/question/check', {
                    id: questions[currentQuestion].id,
                    answer: answer,
                });
                console.log(response.data.answer);
                if(response.data.answer == true) {
                    points++
                    alert("Correct!")
                }else alert("Incorrect")
            } catch (error) {
                console.error(error);
            }
            
            currentQuestionAnswered = true

            if((currentQuestion+1) == questions.length){
                alert(`Done. Correctly answered - ${points}/${currentQuestion+1}`)
                document.location.href="/quiz";
                // TODO DONE
            }else{
                currentQuestion++
                setQuestion(currentQuestion)
            }
        }

    </script>
@endsection
