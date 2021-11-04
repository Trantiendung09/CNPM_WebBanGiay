<?php

namespace App\Http\Controllers;

use App\Http\Requests\Acount\acountResquest;
use App\Models\Acount;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class AcountController extends Controller
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
        return view('layout.singin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(acountResquest $request)
    {
        User::create([
            'email'=>(string)$request->input('email'),
            'password'=>bcrypt($request->password),
            'Acount_name'=>(string)$request->input('name'),
            'Phone'=>(string)$request->input('phone'),
            'Adress'=>(string)$request->input('adress'),
            'Full_name'=>(string)$request->input('full_name'),
            'Role'=>(int) 0
        ]);
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function show(Acount $acount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function edit(Acount $acount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acount $acount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acount $acount)
    {
        //
    }
}
