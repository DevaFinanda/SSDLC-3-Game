<?php namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';

    public function getQuestionsByLevel($level)
    {
        return $this->where('level', $level)->findAll();
    }
}