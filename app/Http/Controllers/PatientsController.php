<?php

namespace App\Http\Controllers;

use App\Patients;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients_arr = array();
        $patients = patients::all();

        foreach ($patients as $patient) {
            $patients_arr[] = array(
                'name'          =>  "$patient->last_name, $patient->first_name $patient->middle_name",
                'birthday'      =>  Carbon::parse($patient->birthday)->toFormattedDateString(),
                'pin_number'    =>  $patient->pin_number,
                'room_number'   =>  $patient->room_number,
            );
        }
        return view('patients.index', array(
            'patients' =>  $patients_arr
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patients = new Patients;
        $patients->first_name = $request->first_name;
        $patients->last_name = $request->last_name;
        $patients->middle_name = $request->middle_name;
        $patients->birthday = $request->birthday;
        $patients->pin_number = $request->pin_number;
        $patients->room_number = $request->room_number;
        $patients->save();

        $request->session()->flash('status', 'New Patient Added!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
