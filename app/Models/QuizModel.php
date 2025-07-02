
<?php
namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['level_id', 'question_text'];

    public function getQuestionsByLevel($level_id)
    {
        return $this->where('level_id', $level_id)->findAll();
    }

    public function getAnswers($question_id)
    {
        return $this->db->table('answers')->where('question_id', $question_id)->get()->getResultArray();
    }
}
