function hover_logo(){
    document.querySelector('.logo-in').children[0].src="/img/logo_in2.png";
    
}
function not_hover_logo(){
    document.querySelector('.logo-in').children[0].src="/img/logo_in.png";

}

function close_modal(){
    let mod=document.querySelector('.modal');

    let main_section=document.querySelector('main');
    mod.style.display= 'none';

    main_section.style.opacity="1"
    main_section.style.pointerEvents='visible';

    let content=document.querySelector('.content');
    content.removeChild(document.querySelector('.tabella_prodotti'));

    
}
function requestDataAjax(url,functionToDo1){
    let http= new XMLHttpRequest()
    http.onreadystatechange=function(){
        if(http.readyState === 4 && http.status === 200){
            console.log('ok')
             functionToDo1(this.responseText)
        }
        

    }
    http.open('GET',url);
    
    http.send()
}


function open_modal(add_or_view, category,the_or_an,url){
   
    // open mod
    let mod=document.querySelector('.modal');
    mod.style.display= 'block';
    
    
    let main_section=document.querySelector('.alert-div');
 
    let title_new_modal = document.querySelector('.title').textContent;
    let title_old_modal = document.querySelector('.form-title');
    const input_search= document.querySelector('.search');
    

    
    
    table_created=create_structure_table();

    
    
    requestDataAjax(url,printData)

    input_search.addEventListener('input',search_somethings)



    //function used
    function search_somethings(input_obj){
        const table=document.querySelector('.tabella_prodotti');
        let tr=table.getElementsByTagName('tr');
        let text_to_search=input_obj.target.value
        let max=tr.length
        
        for(let i=1; i < max; i++){
            
            let riga=table.rows[i]
            let codiceByInput=text_to_search.replace('#','').toLowerCase()
            
            let tdWhereSearch 
            if(text_to_search[0] === '#'){
                 tdWhereSearch = riga.cells[1]
            
            }else{
                 tdWhereSearch =riga.cells[2]
               
            }
            
            riga.style.display='none'
            if(tdWhereSearch.innerHTML.indexOf(codiceByInput) !== -1)  riga.style.display='';
            
            
        }

    }

    function create_structure_table(){
        //creo la tabella principale
        main_records=document.querySelector('.content');
        const table= document.createElement('table');
        table.className="tabella_prodotti";
        main_records.appendChild(table)

        let ths_title=['Immagine','Codice','Nome','Categoria','Prezzo', 'Ottieni/Rimuovi']
        let tr1=document.createElement('tr');
        table.appendChild(tr1);

        for(let th_title of ths_title){
            let ths=document.createElement('th');
            ths.appendChild(document.createTextNode(th_title))
            tr1.appendChild(ths);
        }

        return table;
    }

    function add_items(item,object_principale,datas){
        let capo_riga=document.createElement('tr');
    
        object_principale.appendChild(capo_riga);
       
     
        for(let key in item){
        
            let row=document.createElement('td');
            
            if(key == 'id_category'){
               
                row.appendChild(document.createTextNode(item['categories']['name']));
            
            }else if(key == 'categories') {
                
                
            
            }else if(key == 'name'){

                row.appendChild(document.createTextNode(item[key].toLowerCase()))

            }else{
                row.appendChild(document.createTextNode(item[key]));
            }
            
            capo_riga.appendChild(row);
           
        }
        

    }

    function printData(datas){
        console.log(datas)
        if(add_or_view === 'add'){
            title_old_modal.textContent='Aggiungi '+the_or_an+' '+category+' al tuo catalogo';
             for(let test of datas)
             {
                 add_items(test , table_created);
    
             }
    
    
             }else if(add_or_view === 'view'){
             title_old_modal.textContent='Vedi '+the_or_an+' '+category+' del tuo catalogo';
    
         }
    }
    
}
