<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        .endpoint {
            background: #f9f9f9;
            padding: 10px;
            border-left: 5px solid #007BFF;
            margin-bottom: 15px;
        }
        code {
            background: #eef;
            padding: 2px 5px;
            border-radius: 4px;
        }
        .method {
            font-weight: bold;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .get { background: green; }
        .post { background: blue; }
        .put { background: orange; }
    </style>
</head>
<body>
    <div class="container">
        <h1>API Documentation</h1>

        <h2>Authentication</h2>
        <div class="endpoint">
            <span class="method post">POST</span> <code>{{url}}/register</code>
            <p><strong>Description:</strong> Register a new user.</p>
            <p><strong>Input:</strong> name, email, password</p>
            <p><strong>Response:</strong> Returns an authentication token.</p>
        </div>

        <div class="endpoint">
            <span class="method post">POST</span> <code>{{url}}/login</code>
            <p><strong>Description:</strong> Login user.</p>
            <p><strong>Input:</strong> email, password</p>
            <p><strong>Response:</strong> Returns an authentication token.</p>
        </div>

        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/profile</code>
            <p><strong>Description:</strong> Fetch user info.</p>
            <p><strong>Response:</strong> Returns user details and token.</p>
        </div>

        <h2>Subjects</h2>
        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/subjects</code>
            <p><strong>Description:</strong> Retrieve all subjects.</p>
            <p><strong>Response:</strong> Returns a list of subjects.</p>
        </div>

        <h2>Chapters</h2>
        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/chapters/{subjectId}</code>
            <p><strong>Description:</strong> Retrieve chapters based on subject ID.</p>
            <p><strong>Response:</strong> Returns a list of chapters.</p>
        </div>

        <h2>Exams</h2>
        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/exams/{chapterId}</code>
            <p><strong>Description:</strong> Retrieve exams based on chapter ID.</p>
            <p><strong>Response:</strong> Returns a list of exams.</p>
        </div>

        <h2>Exam Sessions</h2>
        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/exam-sessions</code>
            <p><strong>Description:</strong> Retrieve all exam sessions for the authenticated user.</p>
            <p><strong>Response:</strong> Returns exam session data.</p>
        </div>
        
        <div class="endpoint">
            <span class="method post">POST</span> <code>{{url}}/exam-sessions</code>
            <p><strong>Description:</strong> Create a new exam session.</p>
            <p><strong>Input:</strong> mood_id, subject_id, chapters[], exams[], question_count</p>
            <p><strong>Response:</strong> Stores session and generates questions.</p>
        </div>

        <h2>Exam Histories</h2>
        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/exam-histories/{sessionId}</code>
            <p><strong>Description:</strong> Retrieve exam history for a session.</p>
            <p><strong>Response:</strong> Returns all questions and answers.</p>
        </div>

        <div class="endpoint">
            <span class="method put">PUT</span> <code>{{url}}/exam-histories/{examHistoryId}</code>
            <p><strong>Description:</strong> Update a question when a user answers.</p>
            <p><strong>Response:</strong> Returns the answer status.</p>
        </div>

        <div class="endpoint">
            <span class="method get">GET</span> <code>{{url}}/exam-histories/result/{sessionId}</code>
            <p><strong>Description:</strong> Get the exam result.</p>
            <p><strong>Response:</strong> Displays the exam summary.</p>
        </div>
    </div>
</body>
</html>




- Islam salah

- *install commands :
- 1-import database

- 2-run:
- composer install
- npm install
- php artisan storage:link
- php artisan serve
- php artisan storage:link
- php artisan db:seed


- refresh app:
- php artisan cache:clear;
- php artisan config:clear;
- php artisan route:clear;
- php artisan view:clear;

- Import Models into the Search Index:
- php artisan scout:import "App\\Models\Mood"
- php artisan scout:import "App\\Models\Subject" 
- php artisan scout:import "App\\Models\Chapter"
- php artisan scout:import "App\\Models\Subscription" 
- php artisan scout:import "App\\Models\Question" 
- php artisan scout:import "App\\Models\\Answer"
- php artisan scout:import "App\\Models\\ExamSession"
- php artisan scout:import "App\\Models\\ExamHistory"


Exams Application Specification Document
App Features Overview

1. Exam Modes
   - Exam Mode: Simulates a timed exam with results at the end.
   - Study Mode : dont handel yet

2. Subject Selection
   - Users can choose a subject from a list.
   - Option to filter questions by academic year or choose specific years (e.g., multiple-choice from multiple years or a specific year).

3. Chapter Selection
   - Users can select one or more chapters to include in the session.
   - Chapters are selected using a multiple-choice interface.

4. Question Settings
   - Users specify the number of questions for the session. Max 40

5. Session Creation
   - Parameters:
     - Session Type: Exam Mode or Study Mode
     - Subject: Selected subject
     - Years: Filtered years
     - Chapters: Selected chapters
     - Number of Questions: Defined question count
   - Action: Click "Confirm" to start the session.

Exam Flow

1. Start Exam/Study Mode
   - Questions are displayed one at a time.
   - Each question includes:
     - Question Text: The main question.
     - Description: Additional context or information.
     - Summary: Key points to understand the topic.
     - Image: Visual support for the question.
     - Answers: Multiple answers, with only one correct.

2. Answering Questions
   - User selects an answer and submits.
   - Feedback:
     - Indicates if the answer is correct or incorrect.
     - Provides a description of why the selected answer is correct or not.

3. End Exam
   - Options:
     - Complete Exam: Shows results, including:
       - Total questions
       - Correct answers
       - Incorrect answers
     - Suspend Exam: Saves progress and marks the session as "In Progress".

Exam History

- Users can view their exam history, including:
  - Completed Exams: Results and all answered questions.
  - In Progress Exams: Resume sessions from the last question.

Payment System
Subscription Packages

1. Free Trial Subscription
   - Accessible to all users.
   - Limited access to selected features.

2. Paid Packages
   - Various tiers based on the number of features or exam sessions.
   - Example Tiers:
     - Basic Plan: Access to one subject/year combination.
     - Standard Plan: Access to multiple subjects/years.
     - Premium Plan: Unlimited access.

Requirements for Development

1. User Management
   - User authentication and authorization.
   - Track individual user progress, subscriptions, and history.

2. Session Handling
   - Manage sessions based on user input.
   - Save, retrieve, and update sessions for "In Progress" exams.

3. Question Bank
   - Database for subjects, chapters, questions, and answers.
   - Each question includes text, description, summary, image, and answers.

4. Payment Integration
   - Support for free trial and paid packages.
   - Integrate with payment gateways for subscriptions.

5. Dashboard
   - User-friendly interface for:
     - Starting new sessions.
     - Viewing history and progress.
     - Managing subscriptions.

6. Analytics
   - Insights on user performance over time.
   - Track question categories and success rates.
