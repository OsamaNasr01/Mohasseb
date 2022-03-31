<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Pinvoice;
use App\Models\Inventryin;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Pinvoice::get();

        return view('invoices.index', [
            'invoices' => $invoices,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::get();
        return view('invoices.create', [
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
        Pinvoice::create([
            'name' => $request -> project_name,
            'client_id' => $request -> client_id,
            'value' => $request -> subtotal,
        ]);

        $invoice_id = Pinvoice::select()->max('id');
        $invoiceitems = Item::get();

        Item::truncate();

        foreach ($invoiceitems as $item) {

            Inventryin::create([
                'product_id' => $item -> product_id,
                'pinvoice_id' => $invoice_id,
                'no' => $item -> no,
                'price' => $item -> product -> prices -> p_price,
            ]);
        };

        return redirect() -> route('invoice.index');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pinvoice $invoice)
    {
        // dd($invoice);
        return view('invoices.show', [
            'invoice' => $invoice,
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
