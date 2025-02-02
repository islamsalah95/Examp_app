<?php

namespace App\Http\Controllers\Web;

use App\Models\Exam;
use App\Models\Answer;
use App\Models\Chapter;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.question.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::all();
        return view('dash.web.question.create', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {


        $question = Question::create($request->validated());

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            uploadImage($question, $request->img, 'questions');
        }

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_a,
            'is_correct' => $request->correct_answer == 'answer_a' ? true : false,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_b,
            'is_correct' => $request->correct_answer == 'answer_b' ? true : false,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_c,
            'is_correct' => $request->correct_answer == 'answer_c' ? true : false,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_d,
            'is_correct' => $request->correct_answer == 'answer_d' ? true : false,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_e,
            'is_correct' => $request->correct_answer == 'answer_e' ? true : false,
        ]);

        return redirect()->route('question.index')->with('success', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $answers = $question->answers; // Assuming a relationship exists
        $exams = Exam::all(); // Fetch chapters for the dropdown


        return view('dash.web.question.edit', compact('question', 'answers', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        $question->answers[0]->update([
            'question_id' => $question->id,
            'answer_text' => $request->answer_a,
            'is_correct' => $request->correct_answer == 'answer_a' ? true : false,
        ]);

        $question->answers[1]->update([
            'question_id' => $question->id,
            'answer_text' => $request->answer_b,
            'is_correct' => $request->correct_answer == 'answer_b' ? true : false,
        ]);

        $question->answers[2]->update([
            'question_id' => $question->id,
            'answer_text' => $request->answer_c,
            'is_correct' => $request->correct_answer == 'answer_c' ? true : false,
        ]);

        $question->answers[3]->update([
            'question_id' => $question->id,
            'answer_text' => $request->answer_d,
            'is_correct' => $request->correct_answer == 'answer_d' ? true : false,
        ]);

        $question->answers[4]->update([
            'question_id' => $question->id,
            'answer_text' => $request->answer_e,
            'is_correct' => $request->correct_answer == 'answer_e' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            uploadImage($question, $request->img, 'questions');
        }

        return redirect()->route('question.index')->with('success', 'Question updated successfully');
    }


    public function editAnswers(Question $question)
    {
        $answers = $question->answers; // Assuming a relationship exists
        $exams = Exam::all(); // Fetch chapters for the dropdown


        return view('dash.web.question.edit-answers', compact('question', 'answers', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAnswers(Request $request, Question $question)
    {


        $question->answers[0]->update([
            'answer_text' => $request->answer_a,
            'description' => $request->description_a,
            'is_correct' => $request->correct_answer == 'answer_a' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img_a')) {
            uploadImage($question->answers[0], $request->img_a, 'answers');
        }


        $question->answers[1]->update([
            'answer_text' => $request->answer_b,
            'description' => $request->description_b,
            'is_correct' => $request->correct_answer == 'answer_b' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img_b')) {
            uploadImage($question->answers[1], $request->img_b, 'answers');
        }




        $question->answers[2]->update([
            'answer_text' => $request->answer_c,
            'description' => $request->description_c,
            'is_correct' => $request->correct_answer == 'answer_c' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img_c')) {
            uploadImage($question->answers[2], $request->img_c, 'answers');
        }




        $question->answers[3]->update([
            'answer_text' => $request->answer_d,
            'description' => $request->description_d,
            'is_correct' => $request->correct_answer == 'answer_d' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img_d')) {
            uploadImage($question->answers[3], $request->img_d, 'answers');
        }




        $question->answers[4]->update([
            'answer_text' => $request->answer_e,
            'description' => $request->description_e,
            'is_correct' => $request->correct_answer == 'answer_e' ? true : false,
        ]);

        // Handle image upload if provided
        if ($request->hasFile('img_e')) {
            uploadImage($question->answers[4], $request->img_e, 'answers');
        }





        return redirect()->route('question.index')->with('success', 'Question updated successfully');
    }
}
