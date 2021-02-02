<?php

namespace App\Http\Controllers;

use App\User;
use App\Establishment;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstablishmentController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show list of establishments
     * @return Response
     */
    public function showAll() {
        $establishments = Establishment::orderBy('created_at','asc')->get();
        return view('establishments', [
            'establishments' => $establishments
        ]);
    }

    /**
     * Create a new establishment
     *  @return Response
     */
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

    // Create The Establishment
        $establishment = new Establishment;
        $establishment->name = $request->name;
        $establishment->description = $request->description;
        $establishment->save();
        return redirect()->back();
    }
}