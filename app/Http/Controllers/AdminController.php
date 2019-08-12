<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function initRound2()
    {
        if (env('ROUND') != 2) {
            return redirect()->back()->withErrors(['message' => 'Round 1 is still in-effect.']);
        } else {
            if (\App\Candidate::countFinalist() == 6) {
                return redirect()->back()->withErrors(['message' => 'Round 2 is already initialized.']);
            }

            foreach (\App\Candidate::get() as $candidate) {
                if ($candidate->round1Rank() < 4) {
                    $candidate->finalist = 1;
                    $candidate->save();
                    foreach (\App\User::where('role', 'judge')->get() as $judge) {
                        foreach (['beauty', 'brain'] as $criteria) {
                            \App\Score::create([
                                'user_id' => $judge->id,
                                'candidate_id' => $candidate->id,
                                'criteria' => $criteria
                            ]);
                        }
                    }
                }
            }
            return redirect('/summary')->withInfo(['message' => 'Round 2 has been initialized.']);
        }
    }

    public function users()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/users');
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/users');
    }

    public function deleteUser(User $user)
    {
        return view('admin.confirm-delete', compact('user'));
    }

    public function confirmDeleteUser(User $user)
    {
        $user->delete();
        return redirect('/users')->with('info', 'The user has been deleted.');
    }
}
