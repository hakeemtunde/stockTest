<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Sale;

class SalesController extends Controller
{
    
    public function index()
    {
        $sales = Sale::all();
        return view('sale.sales')->with(compact('sales'));
    }
    
    public function saleForm(Stock $stock) 
    {
        return view('sale.form')
            ->with(compact('stock'))->with(['success' => null]);
    }
    
    public function sale(Stock $stock, Request $request)
    {
        $request->validate(['qty'=> 'required|numeric']);
        
        $remaining_qty = $stock->qty - $request->input('qty');
        $cost = $stock->price * $request->input('qty');
        
        $stock->update(['qty'=> $remaining_qty]);
        
        Sale::create([
            'stock_id' => $stock->id, 
            'qty' => $request->input('qty'),
            'cost' => $cost
        ]);
        
        return redirect('sales');
    }
}
