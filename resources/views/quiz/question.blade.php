@extends('dashboard')
@section('content')
    <h1>Creating New Question</h1>
    <form action="{{ route('question.store') }}" method="POST">
        @csrf
        <input type="text" placeholder="QUIZ ID hidden" name="quiz_id" id="" style="visibility: hidden;" value="{{ $quiz_id }}"/> <br>
        <input type="text" placeholder="Question" name="question" id="" class="mb-3"> <br>
        <input type="text" placeholder="Image URL" name="imgUrl" id="" class="mb-3"> <br>
        <input type="text" placeholder="Answer 1" name="ans1" id="" class="mb-3"> <br>
        <input type="text" placeholder="Answer 2" name="ans2" id="" class="mb-3"> <br>
        <input type="text" placeholder="Answer 3" name="ans3" id="" class="mb-3"> <br>
        <input type="text" placeholder="Answer 4" name="ans4" id="" class="mb-3"> <br>
        <input type="number" placeholder="Correct answ (0-3)" name="correctAnsPosition" id="" class="mb-3"> <br>
        <hr>
        <input type="submit" name="subimit" id="" class="btn btn-primary">
    </form>
@endsection
