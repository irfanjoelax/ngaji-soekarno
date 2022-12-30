<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function index()
    {
        return view('admin.information', [
            'information' => Information::first(),
        ]);
    }

    public function store(Request $request)
    {
        Information::first()->update([
            'phone'   => $request->phone,
            'email'   => $request->email,
            'address' => $request->address,
        ]);

        Alert::info('Success', 'Your information website has been updated');

        return redirect()->route('information.index');
    }
}
