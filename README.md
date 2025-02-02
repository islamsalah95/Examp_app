# API Documentation

## Authentication

### Register
**POST** `{{url}}/register`  
**Description:** Add a new user.  
**Input:** `name`, `email`, `password`  
**Response:** Returns an authentication token.  

### Login
**POST** `{{url}}/login`  
**Description:** Login user.  
**Input:** `email`, `password`  
**Response:** Returns an authentication token.  

### Profile
**GET** `{{url}}/profile`  
**Description:** Fetch user info.  
**Response:** Returns user details and token.  

---

## Moods

### Get Moods
**GET** `{{url}}/moods`  
**Description:** Retrieve all moods.  
**Response:** Returns a list of moods.  

---

## Subjects

### Get Subjects
**GET** `{{url}}/subjects`  
**Description:** Retrieve all subjects.  
**Response:** Returns a list of subjects.  

---

## Chapters

### Get Chapters
**GET** `{{url}}/chapters/{subjectId}`  
**Description:** Retrieve chapters based on subject ID.  
**Response:** Returns a list of chapters.  

---

## Exams

### Get Exams
**GET** `{{url}}/exams/{chapterId}`  
**Description:** Retrieve exams based on chapter ID.  
**Response:** Returns a list of exams.  

---

## Exam Sessions

### Get Exam Sessions
**GET** `{{url}}/exam-sessions`  
**Description:** Retrieve all exam sessions for the authenticated user.  
**Response:** Returns exam session data.  

### Create Exam Session
**POST** `{{url}}/exam-sessions`  
**Description:** Create a new exam session.  
**Notices:**
1. Chapters must belong to the selected subject.  
2. Exams must belong to the selected chapters.  
3. Users who purchased a subject can access all exams, while free users can only access free exams.  

**Input:**
1-    "mood_id": 1,
2-    "subject_id": 1,
3-    "chapters": [1,2,3],
4-    "exams": [1,5],
5-    "question_count": 20





## Exam Histories

### Get Exam History
**GET** `{{url}}/exam-histories/{sessionId}`  
**Description:** Retrieve exam history for a session.  
**Response:** Returns all questions and answers.  

### Update Exam History
**PUT** `{{url}}/exam-histories/{examHistoryId}`  
**Description:** Update a question when a user answers.  
**Response:** Returns the answer status.  

### Get Exam Result
**GET** `{{url}}/exam-histories/result/{sessionId}`  
**Description:** Get the exam result.  
**Response:** Displays the exam summary.  



# *****************************************************************************************


# Laravel Prject Install Start

## Installation Commands

### 1. Import Database
Before running the project, make sure to import the database dump.

### 2. Run the following commands:
```sh
composer install
npm install
php artisan storage:link
php artisan serve
php artisan storage:link
php artisan db:seed
```

## Refresh Application Cache
If you need to refresh the application, run the following commands:
```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Import Models into the Search Index
To import models into Algolia (or the configured search engine), run the following commands:
```sh
php artisan scout:import "App\Models\Mood"
php artisan scout:import "App\Models\Subject"
php artisan scout:import "App\Models\Chapter"
php artisan scout:import "App\Models\Subscription"
php artisan scout:import "App\Models\Question"
php artisan scout:import "App\Models\Answer"
php artisan scout:import "App\Models\ExamSession"
php artisan scout:import "App\Models\ExamHistory"



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
