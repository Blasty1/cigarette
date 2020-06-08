<?php

namespace App\Http\Controllers;

use App\Update_prize;
use Illuminate\Http\Request;
use App\Controllers\Imports;

class UpdatePrizeController extends Controller
{
    /**
     * connessione e ottenimento dei dati dal sito fit
     */
    static public function conn_to_fit()
    {
        //get info from website 
        $url = "https://www.tabaccai.it/index.php/servizi/tariffe";
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    // controlla se ci sono aggiornamenti dei prezzi
    static public function aggiornamento_prezzi()
    {
         
        

        $data = self::conn_to_fit();


         $mesi=[
            'gennaio',
            'febbraio',
            'marzo',
            'aprile',
            'maggio',
            'giugno',
            'luglio',
            'agosto',
            'settembre',
            'ottobre',
            'novembre',
            'dicembre'
        ];
        $months=[
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        //get first part of string
        $first_part_of_new_update=substr($data,strpos($data,'Variazioni'));
        //get the string
        $string_new_update=substr($first_part_of_new_update,0,strpos($first_part_of_new_update,date('Y')));
        //sostituisco una parola
        $date_italian=\str_replace(['Variazioni'],'',$string_new_update);
        //traduco il mese in inglese
        $date_ing= \str_replace($mesi,$months,$date_italian);
        $date = \DateTime::createFromFormat(' d M ', $date_ing);
        //ottengo la data
       
 
        //get the last update
        $last_update=\App\Update_prize::orderby('date','desc')->first();
 
        //se l'aggiornamento non è stato eseguito, viene eseguito
        if( !$last_update || $date->format('Y-m-d') > $last_update->date){
           $new_data= new \App\Update_prize;
           $new_data->date = $date->format('Y-m-d');
           
 
           $new_data->save();

           return $date->format('Y-m-d');
        }

        return $last_update->date;
     
    }



    /**
     * installazione dell'inventario
     */
    public function install_inventary()
    {
        //elimino l'intestazione del fle
        function get_file($path_file){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path_file); 
            
            // Store data from the activeSheet to the varibale 
            // in the form of Array 
            $file=$spreadsheet->getActiveSheet();
            $file->SetCellValue('A2','');
            $file->SetCellValue('B1','');
        
         
            $file->removeRow(1);
            

            
            

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save($path_file);

            return $file;

        }

        //Ottengo le generalità di ogni prodotto dal catalogo, per mezzo di un file xls 
        function retrieve_data($file_to_use,$category){
            $id_category= \App\Category::select('id')->where('name',$category)->get();
            for($x=0;$x <= $file_to_use->getHighestRow(); $x++){
                $codice=$file_to_use->getCell('B'.$x)->getValue();
                $name=$file_to_use->getCell('C'.$x)->getValue();
                $prezzo=(double)($file_to_use->getCell('E'.$x)->getValue());
                $quantità=(int)(preg_replace('/[^0-9]/', '', $file_to_use->getCell('F'.$x)->getValue()));
                
                if( is_int($codice) && is_string($name) && is_double($prezzo) && is_int($quantità) && $id_category){
                     $data_to_import[]=[
                        'codice' => $codice,
                        'name' => $name,
                        'prezzo' => $prezzo,
                        'Grammi/Pezzi' => $quantità,
                        'id_category' => $id_category[0]->id,
                        'img' => 'okoko'
                    ];
                }
            }
            return $data_to_import;

        }

        //ottengo gli ultimi prezzi
        $last_update=str_replace('-','',self::aggiornamento_prezzi());

        //categorie che popoliamo
        $categories=[
            'sigarette',
            'sigaretti',
            'sigari',
            'trinciati_sigarette',
            'inalazione_senza_combustione'

        ];

        //ottengo i file in locale
        for($i=0; $i < count($categories); $i++){
            //get the link of the pdf
            $name_file[]="https://www.tabaccai.it/images/XLS/".$last_update."/".$categories[$i]."_".$last_update.".xls";
            
            //get info from website 
            $url = $name_file[$i];
            $ch = \curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            $path=\storage_path().'/app/'.$categories[$i].'.xls';
            $file_local=fopen($path,'w');
           //salviamo i file in locale
            fwrite($file_local,$data);
            
            fclose($file_local);
        
            $array_to_insert=retrieve_data(get_file($path),$categories[$i]);
            if(!empty($array_to_insert)){
                \App\Product::insert($array_to_insert);
            }
            
            
            
            
        
        }

        
        


    


    }

  
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Update_prize  $update_prize
     * @return \Illuminate\Http\Response
     */
    public function show(Update_prize $update_prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update_prize  $update_prize
     * @return \Illuminate\Http\Response
     */
    public function edit(Update_prize $update_prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update_prize  $update_prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update_prize $update_prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update_prize  $update_prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update_prize $update_prize)
    {
        //
    }
}
