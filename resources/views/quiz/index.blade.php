@extends('dashboard')
@section('content')
<div class="mb-3"><a href={{ route('quiz.create') }}>Create New Quiz</a></div>
    @foreach ($quizzes as $quiz)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
            <div class="p-6 text-gray-900 d-flex justify-content-between">
                <img src="{{ $quiz->imgUrl }}" style="width:100px; height:100px;">
                <div>Name - {{ $quiz->name }}</div>
                <div>Questions - {{ $quiz->questions_count }}</div>
                <div><a href={{ route('quiz.show',$quiz->id) }}>View</a></div>
                <br/>
            </div>
        </div>
    @endforeach
@endsection
