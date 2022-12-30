<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function store(Request $request)
    {
        $user     = Auth::user();
        $password = $user->password;

        if ($request->password != NULL) {
            $password = bcrypt($request->password);
        }

        User::findOrFail($user->id)->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $password,
        ]);

        Alert::success('Success', 'Your profile has been updated');

        return redirect()->back();
    }
}
