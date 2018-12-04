<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\People;

class PeopleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        request()->validate([
            'voornaam' => 'required|min:2',
            'email' => 'required|email',
            'straatnaam' => 'required|min:2',
            'huisnummer' => 'required|min:1',
            'postcode' => 'required|min:6',

            ]);

            $people = new People;
            $people->firstname = request('voornaam');
            $people->email = request('email');
            $people->streetname = request('straatnaam');
            $people->housenumber = request('huisnummer');
            $people->postalcode = request('postcode');
            $people->user_id = auth()->user()->id;
            $people->save();

            return back();

        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $person = DB::table('people')->where('id', '=', $id)->first();
            return view('show')->with('person', $person);
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit(Request $request)
        {
            request()->validate([
                'voornaam' => 'required|min:2',
                'email' => 'required|email',
                'straatnaam' => 'required|min:2',
                'huisnummer' => 'required|min:1',
                'postcode' => 'required|min:6',

                ]);
                $person = People::where('id', $request->id)->first();

                if ($person->user_id == auth()->user()->id) {

                    if ($request->email != $person->email) {
                        $person->update([
                            'email' => $request->email
                            ]);
                        }

                        if ($request->voornaam != $person->firstname) {

                            $person->update([
                                'firstname' => $request->voornaam
                                ]);
                            }

                            if ($request->straatnaam != $person->streetname) {
                                $person->update([
                                    'streetname' => $request->straatnaam
                                    ]);
                                }

                                if ($request->huisnummer != $person->housenumber) {
                                    $person->update([
                                        'housenumber' => $request->huisnummer
                                        ]);
                                    }

                                    if ($request->postcode != $person->postalcode) {
                                        $person->update([
                                            'postalcode' => $request->postcode
                                            ]);
                                        }
                                    }


                                    return back();

                                }

                                /**
                                * Update the specified resource in storage.
                                *
                                * @param  \Illuminate\Http\Request  $request
                                * @param  int  $id
                                * @return \Illuminate\Http\Response
                                */
                                public function update(Request $request, $id)
                                {
                                    //
                                }

                                /**
                                * Remove the specified resource from storage.
                                *
                                * @param  int  $id
                                * @return \Illuminate\Http\Response
                                */
                                public function destroy($id)
                                {
                                    $person = People::where('id', $id)->first();
                                    if ($person->user_id == auth()->user()->id) {
                                        $person->delete();
                                        return redirect()->route('home');
                                    }
                                }
                            }
