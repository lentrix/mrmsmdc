<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabulatorController extends Controller
{
    public function index()
    {
        $male = \App\Candidate::where(['category' => 'Mr.'])->orderBy('no')->get();
        $female = \App\Candidate::where(['category' => 'Ms.'])->orderBy('no')->get();
        return view('tabulator.index', ['male' => $male, 'female' => $female]);
    }

    public function summary()
    {
        $judges = \App\User::where(['role' => 'judge'])->get();

        if (env('ROUND') == 1) {
            $male = \App\Candidate::where(['category' => 'Mr.'])->orderBy('no')->get();
            $female = \App\Candidate::where(['category' => 'Ms.'])->orderBy('no')->get();
            return view('tabulator.round1-summary', ['judges' => $judges, 'male' => $male, 'female' => $female]);
        } else {
            $maleFinalist = \App\Candidate::where(['category' => 'Mr.', 'finalist' => 1])->get();
            $femaleFinalist = \App\Candidate::where(['category' => 'Ms.', 'finalist' => 1])->get();
            return view('tabulator.round2-summary', ['judges' => $judges, 'male' => $maleFinalist, 'female' => $femaleFinalist]);
        }
    }

    public function storeOtherScores(Request $request)
    {
        $criterias = ['professionalism', 'production'];
        foreach ($criterias as $criteria) {

            foreach ($request[$criteria] as $candidate_id => $entry) {
                DB::table('scores')->where('candidate_id', $candidate_id)
                    ->where('criteria', $criteria)->update(['score' => $entry, 'user_id' => auth()->user()->id]);
            }
        }

        return redirect()->back();
    }
}
