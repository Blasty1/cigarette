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

function open_modal(add_or_view, category,the_or_an,files_to_view){
    // open mod
    let mod=document.querySelector('.modal');
    mod.style.display= 'block';
    
    
    
    let main_section=document.querySelector('.alert-div');
 
    let title_new_modal = document.querySelector('.title').textContent;
    let title_old_modal = document.querySelector('.form-title');
    const input_search= document.querySelector('.search');


    
    
    table_created=create_structure_table();

    
    
    if(add_or_view === 'add'){
        title_old_modal.textContent='Aggiungi '+the_or_an+' '+category+' al tuo catalogo';
        for(let test of files_to_view)
        {
            add_items(test , table_created);

        }


    }else if(add_or_view === 'view'){
        title_old_modal.textContent='Vedi '+the_or_an+' '+category+' del tuo catalogo';

    }
    input_search.addEventListener('input',myFunction)

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(".search");
        filter = input.value.toUpperCase();
        table = document.getElementById(".tabella_prodotti");
        tr = table.getElementsByTagName("tr");
      
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[2];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }

    function search_somethings(input_obj){
        let table=document.querySelector('.tabella_prodotti');
        let tr=table.getElementsByTagName('tr');
    
        
        for(let i=0; i < tr.length; i++){
            text_to_search=input_obj.target.value;
            let tr_singolo=tr[i]
            
            if(text_to_search[0] === '#'){
                let td_number=tr_singolo.getElementsByTagName('td')[1].textContent
                console.log(td_number)
            }else{
                let td_string=tr_singolo.getElementsByTagName("td")[2]
                console.log(td_string.innerText)
               
            }
            
            
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

    function add_items(item,object_principale){
        let capo_riga=document.createElement('tr');
        object_principale.appendChild(capo_riga);
     
        for(let key in item){
        
            let row=document.createElement('td');
            
            if(key == 'id_category'){
                
                row.appendChild(document.createTextNode(item['categories']['name']));
            
            }else if(key == 'categories') {
                
            }else{
                row.appendChild(document.createTextNode(item[key]));
            }
            capo_riga.appendChild(row);
        }


    }

    
}
