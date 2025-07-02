
<?php
namespace App\Controllers;

use App\Models\ScoreModel;

class Score extends BaseController
{
    public function leaderboard()
    {
        $scoreModel = new ScoreModel();
        $data['scores'] = $scoreModel->getLeaderboard();
        return view('leaderboard', $data);
    }
}
