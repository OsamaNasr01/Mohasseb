<?php

namespace App\Http\Controllers;

use App\Models\Receiptin;
use App\Models\Receiptout;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function __invoke()
    {
        $receiptin = Receiptin::get();
        $receiptout = Receiptout::get();

        // dd($receiptin);

        return view('dashboard.balance', [
            'receiptins' => $receiptin,
            'receiptouts' => $receiptout,
        ]);
    }
}
