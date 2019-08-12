<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JudgeController extends Controller
{
    public function index()
    {
        return view('judge.index');
    }

    public function storeRound1(Request $request)
    {
        if (env('ROUND') != 1) {
            return redirect()->back()->withErrors(['message' => 'We are no longer in Round 1.']);
        }

        $criterias = ['fanwear', 'interview', 'formal'];
        foreach ($criterias as $criteria) {
            foreach ($request[$criteria] as $candidate_id => $entry) {
                DB::table('scores')->where('user_id', $request['judge_id'])->where('candidate_id', $candidate_id)->where('criteria', $criteria)->update(['score' => $entry]);
            }
        }

        return redirect()->back()->with('info', 'Score submitted.');
    }

    public function storeRound2(Request $request)
    {
        if (env('ROUND') != 2) {
            return redirect()->back()->withErrors(['message' => 'We have finished Round 2.']);
        }

        $criterias = ['beauty', 'brain'];

        foreach ($criterias as $criteria) {
            foreach ($request[$criteria] as $candidate_id => $entry) {
                DB::table('scores')->where('user_id', $request['judge_id'])->where('candidate_id', $candidate_id)->where('criteria', $criteria)->update(['score' => $entry]);
            }
        }

        return redirect()->back()->with('info', 'Score submitted.');
    }
}
