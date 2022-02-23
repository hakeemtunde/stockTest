<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('stock.stocks')->with(compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create')->with(['success'=> null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'measure' => 'required'
        ]);
        $data = $request->only(['name', 'price', 'qty', 'measure']);
                
        Stock::create($data);
        
        return view('stock.create')->with(['success'=> 'added successfully']);
    }

    public function show(Stock $stock)
    {
        return view('stock.update')->with(['stock'=> $stock, 'success'=>null]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'measure' => 'required'
        ]);
        $data = $request->only(['name', 'price', 'qty', 'measure']);
        
        $stock->update($data);
        
        return redirect('stocks');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stock)
    {
        Stock::findOrFail($stock)->delete();
        return back();
    }
}
