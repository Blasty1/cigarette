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
    
    
    
    create_structure_table();
    if(add_or_view === 'add'){
        title_old_modal.textContent='Aggiungi '+the_or_an+' '+category+' al tuo catalogo';
        for(let test of files_to_view){
           

        }


    }else if(add_or_view === 'view'){
        title_old_modal.textContent='Vedi '+the_or_an+' '+category+' del tuo catalogo';

    }


    function create_structure_table(){
        //creo la tabella principale
        main_records=document.querySelector('.content');
        const table= document.createElement('table');
        table.className="tabella_prodotti";
        main_records.appendChild(table)

        let ths_title=['Immagine','Codice','Nome','Categoria','Prezzo','Pezzi/Grammi' , 'Ottieni/Rimuovi']
        let tr1=document.createElement('tr');
        table.appendChild(tr1);

        for(let th_title of ths_title){
            let ths=document.createElement('th');
            ths.appendChild(document.createTextNode(th_title))
            tr1.appendChild(ths);
        }
    }
}