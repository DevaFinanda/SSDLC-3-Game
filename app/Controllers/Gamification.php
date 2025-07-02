<?php namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\ScoreModel;

class Gamification extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login dan role-nya player
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'player') {
            return redirect()->to('/login');
        }

        return view('gamification/level_select');
    }

    public function start($level)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'player') {
            return redirect()->to('/login');
        }

        $questionModel = new QuestionModel();
        $data['questions'] = $questionModel->getQuestionsByLevel($level);
        $data['level'] = $level;

        if (empty($data['questions'])) {
            return redirect()->to('/gamification')->with('error', 'Soal tidak ditemukan untuk level ini.');
        }

        return view('gamification/quiz', $data);
    }

    public function submit()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'player') {
            return redirect()->to('/login');
        }

        $score = 0;
        $answers = $this->request->getPost();
        $questionModel = new QuestionModel();
        $questions = $questionModel->getQuestionsByLevel($answers['level'] ?? '');

        foreach ($questions as $q) {
            if (isset($answers['answer'][$q['id']]) && $answers['answer'][$q['id']] == $q['correct_answer']) {
                $score++;
            }
        }

        $scoreModel = new ScoreModel();
        $scoreModel->saveScore(session()->get('user_id'), $answers['level'], $score);

        return view('gamification/result', [
            'score' => $score,
            'level' => $answers['level']
        ]);
    }
}
