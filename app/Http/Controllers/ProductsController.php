<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_arr = array();
        $products = Products::all();

        foreach ($products as $product) {
            $products_arr[] = array(
                'id'                =>  $product->id,
                'inventory_code'    =>  $product->inventory_code,
                'expiry_date'       =>  $product->expiry_date,
                'lot_number'        =>  $product->lot_number,
                'manufacturer'      =>  $product->manufacturer,
                'name'              =>  $product->name,
                'generic_name'      =>  $product->generic,
                'price'             =>  $product->unit_price,
                'quantity'          =>  $product->quantity,
            );
        }
        return view('products.index', array(
            'drugs' =>  $products_arr
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Products;
        $products->name = "";
        $products->company = 1;
        $products->generic = $request->generic_name;
        $products->unit_price = $request->drug_price;
        $products->quantity = $request->qty;
        $products->status = 1;

        // New stuff from first revision
        $products->inventory_code = $request->drug_code;
        $products->expiry_date = $request->expiry_date;
        $products->lot_number = $request->lot_number;
        $products->manufacturer = $request->manufacturer;

        $products->save();

        $request->session()->flash('status', 'New Drug Added!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id)->toArray();

        return view('products.edit', array(
            'drugs' =>  $product
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products, $id)
    {
        $drug = Products::findOrFail($id);

        $drug->name = "";
        $drug->company = 1;
        $drug->generic = $request->generic_name;
        $drug->unit_price = $request->drug_price;
        $drug->quantity = $request->qty;
        $drug->status = 1;

        // New stuff from first revision
        $drug->inventory_code = $request->drug_code;
        $drug->expiry_date = $request->expiry_date;
        $drug->lot_number = $request->lot_number;
        $drug->manufacturer = $request->manufacturer;

        $drug->save();
        $request->session()->flash('status', 'Changes Saved!');
        return redirect('/drugs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
