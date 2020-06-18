@extends('layouts.layout_in')


@section('content')
@include('set')
<link
  rel="stylesheet"
  href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
/>
<script>
let all_fit={!! json_encode($prodotti_casella_1,JSON_HEX_TAG) !!}
console.log(all_fit)
</script>
<div class="modal" style="display:none">
    <div class="alert-div">
        <div class="header-title">
            <h1 class="form-title"></h1>
            <div class="search">
            <input type="text" name="value" placeholder="Merit Gialla oppure #2656">
        </div>
            <div class="close">
                <button onclick='close_modal()'>&times</button>
            </div>
        </div>
        <div class="content">

    </div>
    </div>
</div>


<main id="home">
    <section id="impostazione">

        <div class="fascia-on">
    
            <div class="tendina">
                <div class="head-search" >
                    <h2 class="title">
                            Sigarette che hai in tabaccheria
                    </h2>
                    
                    <img src="/img/plus.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('add','Sigarette','le')">
                    <img src="/img/ingrandisci.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('view','Sigarette','le','okok)">

                </div>
                
                <div class="content">

                </div>
                <div class="content">
                    
                </div>
                <div class="content">

                </div>
                <div class="content">
                    
                </div>
                <div class="content">

                </div>
                <div class="content">
                    
                </div>
                <div class="content">

                </div>
                <div class="content">
                    
                </div><div class="content">

</div>
<div class="content">
    
</div>
            </div>

            <div class="tendina">
                <div class="head-search">
                <h2 class="title">
                        Gratta e vinci che hai in tabaccheria
                    </h2>
                    <img src="/img/plus.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('add','Gratta e Vinci','i')">
                    <img src="/img/ingrandisci.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('view','Gratta e Vinci','i')">
                </div>
            </div>

        </div>
        <div class="fascia-on">

            <div class="tendina">
                <div class="head-search">
                <h2 class="title">
                        Altri prodotti che hai in tabaccheria
                    </h2>
                    <img src="/img/plus.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('add','Altri Prodotti','gli')">
                    <img src="/img/ingrandisci.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('view','Altri Prodotti','gli')">
                </div>
            </div>

            <div class="tendina">
                <div class="head-search">
                <h2 class="title">
                        Aggiungi i dipendenti
                    </h2>
                    <img src="/img/plus.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('add','Dipendenti','i')">
                    <img src="/img/ingrandisci.png" alt="Aggiungi oggetto al catalogo" class="setup_icon" onclick="open_modal('view','Dipendenti','i')">


                </div>
                    
            </div>

        </div>
    </section>
</main>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
@endsection