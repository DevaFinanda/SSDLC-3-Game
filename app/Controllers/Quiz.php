
<?php
namespace App\Controllers;

use App\Models\QuizModel;
use CodeIgniter\Controller;

class Quiz extends BaseController
{
    public function index($level = 1)
    {
        $quizModel = new QuizModel();
        $questions = $quizModel->getQuestionsByLevel($level);

        foreach ($questions as &$question) {
            $question['answers'] = $quizModel->getAnswers($question['id']);
        }

        return view('quiz', ['questions' => $questions, 'level' => $level]);
    }

    public function submit()
    {
        $score = 0;
        $total = count($this->request->getPost());

        foreach ($this->request->getPost() as $question_id => $answer_id) {
            $db = db_connect();
            $result = $db->table('answers')->where(['id' => $answer_id, 'question_id' => $question_id, 'is_correct' => 1])->get()->getRow();
            if ($result) {
                $score++;
            }
        }

        session()->setFlashdata('score', $score);
        return redirect()->to('/result');
    }
}
