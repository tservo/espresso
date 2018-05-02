<?php

namespace App\Http\Controllers;

use App\User;
use App\Establishment;
use App\Http\Controllers\Controller;

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
    public function create() {
        // we'll get a package of data

        // try to add it

        // success or failure.
    }
}