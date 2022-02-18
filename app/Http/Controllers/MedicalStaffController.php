<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalStaff;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Service\IMedicalStaffService;

class MedicalStaffController extends Controller
{

    /**
     * Service of medical staff instance provided by DI Container
     *
     * @var App\Service\IMedicalStaffService;
     */
    protected $staffService;

    public function __construct(IMedicalStaffService $service)
    {
        $this->staffService = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DB::table('medical_staff')->get();
        Auth::guard('medical')->loginUsingId(11);

        if(Auth::guard('medical')->check())
        {
            return dd(Auth::guard('medical')->user());
        }

        //return Inertia::render('page');
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

    public function getCurrentUserData()
    {
        return Inertia::render('Profile', [
            'user' => auth()->guard('medical')->user()
        ]);
    }

    public function getVisitCountByDoctor()
    {
        if(Auth::guard()->check()){   // if user is auth
            $id = auth()->user()->id; // retrive id

            return $this->staffService->visitCountByDoctor($id); // get data
        }

        throw new Exception("User is not authenticated");
    }
}
