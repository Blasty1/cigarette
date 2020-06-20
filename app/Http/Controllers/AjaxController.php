<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
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


    function retrieve_dataJS($category){
        $toPass=[];
        if($category == 'FitAdd'){
            $toPass['data']=self::get_all_about_fit();
            $toPass['mod']='Add';
        }
        
        return view('retrieve_data',$toPass);
    }
}
