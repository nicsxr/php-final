<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create($quiz_id)
    {
        return view('quiz.question', compact("quiz_id"));
    }

    public function store(Request $request)
    {
        Question::create($request->all());
        return redirect('/quiz');
    }

    // public function update(Request $request, $id)
    // {
    //     $question = Question::where('id', $id)->first();
    //     $question->fill($request->all())->save();
    //     return redirect("/quiz");
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Question::find('id', $id);
        $post->delete();
        return redirect('/quiz');
    }
}
