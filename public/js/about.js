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

function indietro(){}