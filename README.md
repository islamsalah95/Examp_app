install commands :
import database

run:
composer install
npm install
php artisan storage:link
php artisan serve



refresh app:
php artisan cache:clear;
php artisan config:clear;
php artisan route:clear;
php artisan view:clear;

Import Models into the Search Index:
php artisan scout:import "App\\Models\Mood"
php artisan scout:import "App\\Models\Subject" 
php artisan scout:import "App\\Models\Chapter"
php artisan scout:import "App\\Models\Subscription" 
php artisan scout:import "App\\Models\Question" 
php artisan scout:import "App\\Models\\Answer"
php artisan scout:import "App\\Models\\ExamSession"
php artisan scout:import "App\\Models\\ExamHistory"





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
