<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::withCount('questions')->get();
        error_log('Some message here.');
        return view('quiz.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quiz.create');
    }

    public function show($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        return view('quiz.show', compact('quiz'));
    }
    
    public function store(Request $request)
    {
        Quiz::create($request->all());
        return redirect('/quiz');
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::where('id', $id)->first();
        $quiz->fill($request->all())->save();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Quiz::find('id', $id);
        $post->delete();
        return redirect('/quiz');
    }

    public function quiz($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        $questions = Question::where('quiz_id', $id)->get();

        return view('quiz.quiz', compact('quiz', 'questions'));
    }

    public function questionCheck(Request $request)
    {
        $question = Question::where('id', $request->id)->first();
        error_log($question->correctAnsPosition);
        error_log($request->answer);
        if ($question->correctAnsPosition == $request->answer)
            return response()->json(['answer' => true]);
        else return response()->json(['answer' => false]);
        
    }
    
}
