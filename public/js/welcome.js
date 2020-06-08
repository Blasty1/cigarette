function avanti(test){
    let articles = test.parentNode.parentNode.children[1].children;
    let article;
    for (article of articles){
        
        if(article.getAttribute('style') != 'display: none;'){

            article.style.display='none'
            let switch_article=parseInt(article.id.slice(-1,article.id.count)) + 1;
            let new_article= (document.getElementById('article'+switch_article)) ? document.getElementById('article'+switch_article) : document.getElementById('article1') 
            new_article.style.display = 'flex'


            break;
            

        }
    }
}
//da fare per about
function indietro(test){
    let articles = test.parentNode.parentNode.children[1].children;
    let article;
    for (article of articles){
        
        if(article.getAttribute('style') != 'display: none;'){

            article.style.display='none'
            let switch_article=parseInt(article.id.slice(-1,article.id.count)) - 1;
            let new_article= (document.getElementById('article'+switch_article)) ? document.getElementById('article'+switch_article) : document.getElementById('article1') 
            new_article.style.display = 'flex'


            break;
            

        }
    }

}

function close_modal(){
    let mod=document.querySelector('.modal');

    let main_section=document.querySelector('main');
    mod.style.display= 'none';

    main_section.style.opacity="1"
    main_section.style.pointerEvents='visible';
    
}