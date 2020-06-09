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

    //ottengo tutte le sigarette, sigari, sigaretti e heets
    static public function get_all_about_fit(){
        

        //ottengo le categorie di cui necessito
        $categories=\App\Category::select('id')
                                    ->orwhere('name','sigarette')
                                    ->orwhere('name','sigari')
                                    ->orwhere('name','sigaretti')
                                    ->orwhere('name','trinciati_sigarette')
                                    ->orwhere('name','inalazione_senza_combustione')
                                    ->get();
        //ottengo gli id delle categorie
        foreach($categories as $id){
            $category_id[]=$id->id;
        }

        return \App\Product::select('img','codice','products.name','id_category','prezzo')->whereIn('id_category',$category_id)->with('categories')->get();
        


        
    }
                                    
    /* Impostazioni riguardanti l'intero ambiente del cliente */

    public function impostazione(){
        
        
        return view('set',[
            'prodotti_casella_1' =>  self::get_all_about_fit(),


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
