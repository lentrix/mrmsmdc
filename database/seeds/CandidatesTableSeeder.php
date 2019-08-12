<?php

use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = [
            [
                'no' => 1,
                'category' => 'Ms.',
                'name' => 'Ashianna Loize Ararao',
                'level' => '???',
                'team' => 'Soul Stone'
            ],
            [
                'no' => 2,
                'category' => 'Ms.',
                'name' => 'Babes Ynnah Ponteres',
                'level' => 'Level???',
                'team' => 'Reality Stone'
            ],
            [
                'no' => 3,
                'category' => 'Ms.',
                'name' => 'Christine Anosa',
                'level' => 'Level???',
                'team' => 'Power Stone'
            ],
            [
                'no' => 4,
                'category' => 'Ms.',
                'name' => 'Geanne Carla Tocmo',
                'level' => 'Level???',
                'team' => 'Time Stone'
            ],
            [
                'no' => 5,
                'category' => 'Ms.',
                'name' => 'Hannah Gwyn Hermoso',
                'level' => 'Level???',
                'team' => 'Space Stone'
            ],
            [
                'no' => 6,
                'category' => 'Ms.',
                'name' => 'Katrina May Bague',
                'level' => 'Level???',
                'team' => 'Mind Stone'
            ],
            [
                'no' => 1,
                'category' => 'Mr.',
                'name' => 'Eric John Capaning',
                'level' => 'Level???',
                'team' => 'Space Stone'
            ],
            [
                'no' => 2,
                'category' => 'Mr.',
                'name' => 'Herbert Bush Montesclaros',
                'level' => 'Level???',
                'team' => 'Time Stone'
            ],
            [
                'no' => 3,
                'category' => 'Mr.',
                'name' => 'Jethro John Parker',
                'level' => 'Level???',
                'team' => 'Soul Stone'
            ],
            [
                'no' => 4,
                'category' => 'Mr.',
                'name' => 'Nathaniel Lawas',
                'level' => 'Level???',
                'team' => 'Power Stone'
            ],
            [
                'no' => 5,
                'category' => 'Mr.',
                'name' => 'Raymond Manatad',
                'level' => 'Level???',
                'team' => 'Reality Stone'
            ],
            [
                'no' => 6,
                'category' => 'Mr.',
                'name' => 'Vinz Troy Gudelosao',
                'level' => 'Level???',
                'team' => 'Mind Stone'
            ],
        ];

        foreach ($candidates as $candidate) {
            \App\Candidate::create([
                'no' => $candidate['no'],
                'name' => $candidate['name'],
                'category' => $candidate['category'],
                'level' => $candidate['level'],
                'team' => $candidate['team'],
            ]);
        }
    }
}
