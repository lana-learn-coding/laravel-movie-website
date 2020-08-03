<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use App\Models\User\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use View;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newReleased()->take(6)->get());
        $this->middleware('auth')->only([
            'favorites',
            'ratedMovies',
            'getUpdate',
            'update'
        ]);
    }

    function userDetail(int $id)
    {
        $user = User::findOrFail($id);
        return view('user.user-detail', [
            'user' => $user,
            'favorites' => $user->favoriteMovies()->paginate(12),
            'rateds' => $user->ratedMovies()->paginate(12),
        ]);
    }

    function favorites(int $id)
    {
        $user = Auth::user();
        return view('user.user-favorite', [
            'user' => $user,
            'favorites' => $user->favoriteMovies()->paginate(12),
        ]);
    }

    function ratedMovies(int $id)
    {
        $user = Auth::user();
        return view('user.user-rated', [
            'user' => $user,
            'rateds' => $user->ratedMovies()->paginate(12),
        ]);
    }

    function getUpdate(int $id)
    {
        $user = Auth::user();

        return view('user.user-update', [
            'user' => $user,
        ]);
    }

    function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['nullable', 'string', 'min:3', 'max:255'],
            'gender' => ['nullable', 'string', 'in:F,M']
        ]);
        $user->detail()->delete();
        $user->detail()->create($request->post());

        if (trim($request->input('username')) !== $user->username) {
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'min:6', 'unique:users'],
            ]);
            $user->username = $request->post('username');
        }
        if ($request->input('change_password') === 'on') {
            $request->validate([
                'password' => 'password',
                'new_password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return view('user.user-update', [
            'user' => $user,
        ]);
    }
}
