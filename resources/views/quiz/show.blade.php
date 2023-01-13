@extends('dashboard')
@section('content')
    <div style="width=100%; text-align:center;">
        <p id="post_id">Quiz #{{ $quiz->id }}</p>
    
        <img src="{{ $quiz->imgUrl }}" style="width:400px; height:400px; margin:auto;">
    
        <h1>quiz {{ $quiz->name }}</h1>
        <h3>{{ $quiz->description }}</h3>
        <hr/>
        <div><a href={{ route('quiz.quiz',$quiz->id) }}>Start</a></div>
        <div><a href={{ route('question.create',$quiz->id) }}>Add Question</a></div>
    </div>

@endsection
