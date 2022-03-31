<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoiceitem;
use App\Models\Sinvoice;
use App\Models\Inventryout;

class SinvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sinvoices = Sinvoice::get();

        return view('sinvoices.index', [
            'invoices' => $sinvoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Invoiceitem::get();
        return view('sinvoices.create', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'client_id' => 'required|integer',
            'subtotal' => 'required|integer',
            'project_name' => 'required|max:255',
        ]);
        // dd($request);
        Sinvoice::create([
            'name' => $request -> project_name,
            'client_id' => $request -> client_id,
            'value' => $request -> subtotal,
        ]);

        $invoice_id = Sinvoice::select()->max('id');
        $invoiceitems = Invoiceitem::get();

        Invoiceitem::truncate();
        // dd($invoiceitems);
        foreach ($invoiceitems as $item) {

            Inventryout::create([
                'product_id' => $item -> product_id,
                'sinvoice_id' => $invoice_id,
                'no' => $item -> no,
                'price' => $item -> product -> prices -> s_price,
            ]);
        };
        // dd('ok');
        return redirect() -> route('sinvoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sinvoice $sinvoice)
    {
        // dd($sinvoice);
        return view('sinvoices.show', [
            'invoice' => $sinvoice,
        ]);
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
