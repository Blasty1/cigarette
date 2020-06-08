<?php

namespace App\Http\Controllers;

use App\Update_prize;
use Illuminate\Http\Request;

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
            
            for($x=1; $x < $file->getHighestRow(); $x++){
                $CellA = $file->getCell('A' . $x)->getValue();
                if(!$CellA){
                    $test1[]= $x;
                                                }

            }
            $file->removeRow(1);

            
            

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save($path_file);

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
        
            get_file($path);

            
            
        
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
