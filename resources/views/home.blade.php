@extends('layouts.layout_in')

@section('content')


<main id="home">
    <section id="home-button">
        <div class="box-button">
        @if (!$is_first)
            <div class="box box-1" onmouseover="hover_logo()" onmouseout="not_hover_logo()">
                <a href="{{route('cassa')}}">
                    <div class="text-explain">
                        <h1>Cassa</h1>
                        <p>Registra ogni vendita, sigarette e gratta e vinci.</p>
                    </div>
                </a>
            </div>
            <div class="box box-2" onmouseover="hover_logo()" onmouseout="not_hover_logo()" >
                <a href="{{route('contabilita')}}">
                    <div class="text-explain">
                        <h1>Contabilità</h1>
                        <p>Statistiche e tutto ciò che riguarda le entrate e le spese</p>
                    </div>
                </a>
            </div>
            @endif
            <div class="box box-3" onmouseover="hover_logo()" onmouseout="not_hover_logo()">
                <a href="{{route('impostazioni')}}">
                    <div class="text-explain">
                        <h1>Impostazione</h1>
                        <p>Seleziona le sigarette e i prodotti che vendi, o modificali</p>
                    </div>
                </a>
              
            </div>
        </div>
        <div class="box-image">
            <div class="logo-in">
            <img src="/img/logo_in.png" alt="">
        
            </div>
        </div>
    </section>
</main>

@endsection