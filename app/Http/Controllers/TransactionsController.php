<?php

namespace App\Http\Controllers;

use App\Transactions;
use App\Patients;
use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction_arr = array();
        $transactions = Transactions::all();

        foreach($transactions as $transaction) {
            $patient = Patients::findOrFail($transaction->patient_id);
            $product = Products::findOrFail($transaction->product_id);
            $transaction_arr[] = array(
                'date'      =>  Carbon::parse($transaction->created_at)->toFormattedDateString(),
                'patient'   =>  "$patient->last_name, $patient->first_name",
                'product'   =>  "[$product->generic] $product->name",
                'quantity'  =>  $transaction->quantity  
            );
        }

        return view('transactions.index', array(
            'transactions'  =>  $transaction_arr
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient_list = Patients::all();
        $product_list = Products::all();

        $patient_arr = array();
        $product_arr = array();

        foreach ($patient_list as $patient) {
            $patient_arr[] = array(
                'patient_id'    =>  $patient->id,
                'patient_name'  =>  "$patient->last_name, $patient->first_name $patient->middle_name"
            );
        }
        
        foreach ($product_list as $product) {
            $product_arr[] = array(
                'product_id'    =>  $product->id,
                'product_name'  =>  "[$product->generic] $product->name",
                'product_qty'   =>  $product->quantity
            );
        }

        return view('transactions.create', array(
            'patient_list'  =>  $patient_arr,
            'product_list'  =>  $product_arr,
        ));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $drug = Products::find($request->drug);
        $drug_qty = $drug->quantity;

        if( $drug_qty  < $request->qty) {
            $request->session()->flash('warning', 'Quantity value cannot be higher than number of drugs on stock!');
            return back()->withInput();
        }            
        
        $transactions = new Transactions;
        $transactions->patient_id = $request->patient;
        $transactions->product_id = $request->drug;
        $transactions->quantity = $request->qty;
        $transactions->save();

        $drug->quantity = $drug_qty - $request->qty;
        $drug->save();

        $request->session()->flash('status', 'New Transaction Added!');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
