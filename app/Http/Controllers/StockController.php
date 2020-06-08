<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use App\Imports\ProductImport;

use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xls; 
class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //ottengo da ogni categoria tutti i prodotti
    static public function get_all_about_category($category){
        
        return (\App\Product::where('id_category',\App\Category::select('id')->where('name',$category)->get()[0]->id)->get());
    }
    /* Impostazioni riguardanti l'intero ambiente del cliente */

    public function impostazione(){
 
            
        return view('set',[
            'sigarette_totali' => self::get_all_about_category('sigarette'),
            'sigari_totali' => self::get_all_about_category('sigari'),
            'sigaretti_totali' => self::get_all_about_category('sigaretti'),
            'tabacco_totali' => self::get_all_about_category('trinciati_sigarette'),
            'heets' => self::get_all_about_category('inalazione_senza_combustione')


        ]);
        
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
