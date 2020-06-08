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

    
}

function open_modal(add_or_view, category,the_or_an){
    // open mod
    let mod=document.querySelector('.modal');
    mod.style.display= 'block';

    
    let main_section=document.querySelector('.alert-div');
    console.log(main_section.children[0])
    let title_new_modal = document.querySelector('.title').textContent;
    let title_old_modal = document.querySelector('.form-title');
    
    
    if(add_or_view === 'add'){
        title_old_modal.textContent='Aggiungi '+the_or_an+' '+category+' al tuo catalogo';


    }else if(add_or_view === 'view'){
        title_old_modal.textContent='Vedi '+the_or_an+' '+category+' del tuo catalogo';

    }
}