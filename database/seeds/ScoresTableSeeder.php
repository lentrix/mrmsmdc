<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $judges = \App\User::where(['role' => 'judge'])->get();
        $candidates = \App\Candidate::get();
        $criterias = ['fanwear', 'interview', 'formal'];

        foreach ($judges as $judge) {

            foreach ($candidates as $candidate) {

                foreach ($criterias as $criteria) {
                    \App\Score::create([
                        'user_id' => $judge->id,
                        'candidate_id' => $candidate->id,
                        'criteria' => $criteria
                    ]);
                }
            }
        }

        foreach ($candidates as $candidate) {
            \App\Score::create([
                'candidate_id' => $candidate->id,
                'criteria' => 'professionalism'
            ]);
            \App\Score::create([
                'candidate_id' => $candidate->id,
                'criteria' => 'production'
            ]);
        }
    }
}
