
<?php
namespace App\Models;

use CodeIgniter\Model;

class ScoreModel extends Model
{
    protected $table = 'scores';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'level_id', 'score', 'taken_at'];

    public function getLeaderboard()
    {
        return $this->select('users.username, levels.name as level, scores.score, scores.taken_at')
                    ->join('users', 'users.id = scores.user_id')
                    ->join('levels', 'levels.id = scores.level_id')
                    ->orderBy('scores.score', 'DESC')
                    ->orderBy('scores.taken_at', 'ASC')
                    ->findAll();
    }
}
