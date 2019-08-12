<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'lentrix',
                'name' => 'Benjie B. Lenteria',
                'role' => 'admin'
            ],
            [
                'username' => 'tab',
                'name' => 'Analou B. Esteban',
                'role' => 'tabulator'
            ],
            [
                'username' => 'judge2',
                'name'  =>  'Perigrino Asubar, Jr.',
                'role' => 'judge'
            ],
            [
                'username' => 'judge3',
                'name'  =>  'Cathy Lynn Macedonia',
                'role' => 'judge'
            ],
            [
                'username' => 'judge1',
                'name'  =>  'Elicer James Kataraha',
                'role' => 'judge'
            ],
        ];

        foreach ($users as $u) {
            User::create([
                'name' => $u['name'],
                'username' => $u['username'],
                'role' => $u['role'],
                'password' => bcrypt('password123')
            ]);
        }
    }
}
