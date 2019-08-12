<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;

class Candidate extends Model
{
    protected $fillable = ['category', 'name', 'team', 'level', 'pic'];

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function criteriaScores($criteria)
    {
        return Score::where(['user_id' => $this->id, 'criteria' => $criteria])->get();
    }

    public static function listByCategory($category)
    {
        return static::where(['category' => $category])
            ->orderBy('no')->get();
    }

    public function round1Rank()
    {
        $totalScores = static::computeTotalScores($this->category);
        $score = $this->computeTotal();
        $rank = 0;
        foreach ($totalScores as $s) {
            $rank++;
            if ($s == $score) break;
        }
        return $rank;
    }

    public function computeRound2Judge($judge_id)
    {
        return Score::where(['user_id' => $judge_id, 'candidate_id' => $this->id])
            ->whereIn('criteria', ['beauty', 'brain'])
            ->sum('score');
    }

    public function computeRound2Average()
    {
        $sum = 0;
        $judges = User::where('role', 'judge')->get();
        foreach ($judges as $judge) {
            $sum += $this->computeRound2Judge($judge->id);
        }
        return $sum / count($judges);
    }

    public function round2Rank()
    {
        $averages = [];
        if ($this->category == 'Mr.')
            $finalist = \App\Candidate::where(['category' => 'Mr.', 'finalist' => 1])->get();
        else
            $finalist = \App\Candidate::where(['category' => 'Ms.', 'finalist' => 1])->get();

        foreach ($finalist as $f) {
            $averages[] = $f->computeRound2Average();
        }

        rsort($averages);
        $rank = 0;
        foreach ($averages as $av) {
            $rank++;
            if ($av == $this->computeRound2Average()) {
                break;
            }
        }
        return $rank;
    }

    private static function computeTotalScores($category)
    {
        $scores = [];
        foreach (static::where('category', $category)->get() as $candidate) {
            $scores[] = $candidate->computeTotal();
        }

        rsort($scores);

        return $scores;
    }

    public function computeTotal()
    {
        return Score::total($this->id, 'fanwear') +
            Score::total($this->id, 'interview') +
            Score::total($this->id, 'formal') +
            Score::getOthers($this->id, 'professionalism') +
            Score::getOthers($this->id, 'production');
    }

    public static function countFinalist()
    {
        return static::where('finalist', 1)->count();
    }
}
