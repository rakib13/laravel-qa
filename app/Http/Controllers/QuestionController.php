<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
        // view('questions.index', compact('questions'))->render();
        // dd(DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        // $request->user()->questions()->create($request->all());
        $request->user()->questions()->create($request->only('title', 'body'));

        // return redirect('/questions');
        return redirect()->route('questions.index')->with('success', "The Question has been Submitted.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /** 
         * USE TO AUTHORIZE USING GATE METHOD 
         *
        

         * if (Gate::denies('update-question', $question)) {
         *    abort(403, "Access denied");
         * }
         */
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {

        $this->authorize('update', $question);

        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', "The question has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        /** 
         * USE TO AUTHORIZE USING GATE METHOD 
         *
         * if (Gate::denies('delete-question', $question)) {
         *    abort(403, "Access denied");
         * }
         */

        $this->authorize('delete', $question);

        $question->delete();

        return redirect('/questions')->with('success', "The Question has been deleted.");
    }
}
