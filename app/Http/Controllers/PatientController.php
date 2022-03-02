<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
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
    public function create(Request $request)
    {

        $response = [];

        $validator = $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'mobileNumber' => 'numeric',
            'nation' => 'string',
            'fiscal_code' => 'required|string|max:20',
            'cap' => 'numeric',
            'address' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'birth' => 'required',
            'sex' => 'required|string',
            'zip' => 'required|numeric'
        ]);

        // data is valid

        try{
            $model = \App\Models\Patient::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phoneNumber,
                'mobile_phone' => $request->mobileNumber,
                'nation' => $request->nation,
                'birth' => $request->birth,
                'fiscal_code' => $request->fiscal_code,
                'address' => $request->address,
                'sex' => $request->sex,
                'zip' => $request->zip
            ]);

            $response["status"] = 201;
            $response["message"] = "Created";
            $response["resource"] = $model;
        }catch(Exception $ex){
            $response["status"] = $ex->getCode();
            $response["message"] = $ex->getMessage();
        }

        return json_encode($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
