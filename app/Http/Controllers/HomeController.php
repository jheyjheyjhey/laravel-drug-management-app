<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patients;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_count = Patients::all()->count();
        $drug_count = Products::all()->count();

        return view('home', array(
            'patient_count' =>  $patient_count,
            'drug_count'    =>  $drug_count,
        ));
    }
}
