<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['candidate_id', 'user_id', 'criteria'];

    public function judge()
    {
        return $this->belongsTo('App\User');
    }

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }

    public static function get($candidate_id, $user_id, $criteria)
    {
        return static::where(['candidate_id' => $candidate_id, 'user_id' => $user_id, 'criteria' => $criteria])->first()->score;
    }

    public static function getOthers($candidate_id, $criteria)
    {
        return static::where(['candidate_id' => $candidate_id, 'criteria' => $criteria])->first()->score;
    }

    public static function total($candidate_id, $criteria)
    {
        return number_format(static::where(['candidate_id' => $candidate_id, 'criteria' => $criteria])
            ->sum('score') / 3, 1);
    }
}
