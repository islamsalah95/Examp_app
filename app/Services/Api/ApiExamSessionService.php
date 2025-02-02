<?php

namespace App\Services\Api;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ExamHistory;
use App\Models\ExamSession;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class ApiExamSessionService
{
    private static ?self $instance = null;

    // Prevent instantiation
    private function __construct() {}

    // Implement singleton pattern
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function handle(array $validatedData, $apiResponse)
    {
        DB::beginTransaction(); // Start a new database transaction
    
        try {
            $validatedData['user_id'] = Auth::id();
            $validatedData['status'] = 'ongoing';
    
            // Find subject
            $subject = Subject::findOrFail($validatedData['subject_id']);
    
            // Validate chapters belong to subject
            if ($this->hasInvalidChapters($validatedData['chapters'], $subject->id)) {
                return $apiResponse->validationError('One or more chapters do not belong to the selected subject.');
            }
    
            // Validate exams belong to selected chapters
            if ($this->hasInvalidExams($validatedData['exams'], $validatedData['chapters'])) {
                return $apiResponse->validationError('One or more exams do not belong to the selected chapters.');
            }
    
            // Check user subscription
            $subscription = Subscription::where('user_id', Auth::id())
                ->where('subject_id', $subject->id)
                ->first();
    
            // Validate free exams if no subscription
            if (!$subscription && $this->hasNonFreeExams($validatedData['exams'])) {
                return $apiResponse->forbidden('The user is only eligible for free exams.');
            }
    
            // Check if subscription is expired
            if ($subscription && $subscription->expires_at < now()) {
                return $apiResponse->forbidden('The subscription expired on ' . $subscription->expires_at);
            }
    
            // Create the exam session
            $examSession = ExamSession::create($validatedData);
    
            if ($examSession) {
                // Create Exam History after exam session creation
                $this->createExamHistory($examSession, $apiResponse);
            }
    
            DB::commit(); // Commit the transaction if everything is successful
    
            return $apiResponse->success($examSession, 'Exam session created successfully.', 201);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack(); // Roll back the transaction on model not found exception
            return $apiResponse->notFound('Subject not found.');
        } catch (\Exception $e) {
            DB::rollBack(); // Roll back the transaction on any other exception
            Log::error('Error creating exam session: ' . $e->getMessage());
            return $apiResponse->serverError('An error occurred while creating the exam session.');
        }
    }

    private function hasInvalidChapters(array $chapterIds, int $subjectId): bool
    {
        return \App\Models\Chapter::whereIn('id', $chapterIds)
            ->where('subject_id', '!=', $subjectId)
            ->exists();
    }

    private function hasInvalidExams(array $examIds, array $chapterIds): bool
    {
        return Exam::whereIn('id', $examIds)
            ->whereNotIn('chapter_id', $chapterIds)
            ->exists();
    }

    private function hasNonFreeExams(array $examIds): bool
    {
        return Exam::whereIn('id', $examIds)
            ->where('type', '!=', 'free')
            ->exists();
    }



    public function createExamHistory($examSession, $apiResponse)
    {
        try {
            $questions = [];
            $examSessionId = $examSession->id;
    
            // Loop over each exam in the session and fetch questions related to that exam
            foreach ($examSession->exams as $exam) {
                // Fetch questions for the current exam with a limit
                $examQuestions = Question::where('exam_id', $exam)
                    ->take($examSession->question_count) // Limit the number of questions fetched
                    ->get();
    
                // Merge the questions into the $questions array
                $questions = array_merge($questions, $examQuestions->all());
            }
    
            // If no questions were found, return early
            if (empty($questions)) {
                return; // No questions to create history for
            }
    
            // Loop through the questions and create exam history records
            foreach ($questions as $question) {
                ExamHistory::create([
                    'exam_session_id' => $examSessionId,
                    'exam_question_id' => $question->id, // Use the question ID
                    'exam_answer_id' => null, // Initially, no answer is selected
                ]);
            }
    
            // Optionally, return a success message or response
            return true;
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            Log::error('Error creating exam history: ' . $th->getMessage());
    
            // Return an error response
            return $apiResponse->serverError('Failed to create exam history.');
        }
    }
}
