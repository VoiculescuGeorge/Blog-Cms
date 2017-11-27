<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;


class UsersController extends Controller
{
    public function users()
    {
        $input = Input::get('name');

        if (isset($input)){

            $users = User::latest()->where('name', 'LIKE', "%{$input}%")->get();

        }else

            $users = User::latest()->get();

        return  view('cms.users-cms',compact('users'));
    }

    public function makeadmin(User $user)
    {
        if ($user->role == 'admin')
        {
            return back()->withErrors([
                'message' => 'This user is allready admin!'
            ]);
        }else{
            $user->role = 'admin';
            $user->save();
        }

        return redirect('/admin/users');
    }

    public function makeuser(User $user)
    {
        if ($user->role == 'user')
        {
            return back()->withErrors([
                'message' => 'This user is allready user!'
            ]);
        }else{
            $user->role = 'user';
            $user->save();
        }

        return redirect('/admin/users');
    }

}
