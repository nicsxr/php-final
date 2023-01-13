@extends('dashboard')
@section('content')
    <h1>Creating New Quiz</h1>
    <form action="{{ route('quiz.store') }}" method="POST">
        @csrf
        <input type="text" placeholder="User ID hidden" name="user_id" id="" style="visibility: hidden;" value="{{ Auth::user()->id }}"/> <br>
        <input type="text" placeholder="Quiz Name" name="name" id="" class="mb-3"> <br>
        <input type="text" placeholder="Image URL" name="imgUrl" id="" class="mb-3"> <br>
        <input type="text" placeholder="Description" name="description" id="" class="mb-3"> <br>
        <hr>
        <input type="submit" name="subimit" id="" class="btn btn-primary">
    </form>
@endsection
