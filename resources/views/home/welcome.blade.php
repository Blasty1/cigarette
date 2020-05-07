@extends('layouts.layout_pre')
@section('content')
<main>
        <section class="presentation">
            <div class="introduction">
                <div class="intro-text">
                    <h1>Gestione delle Vendite</h1>
                    <p>Con questo servizio potrai finalmente evitare di spendere soldi per poter gestire al meglio la
                        tua tabaccheria</p>
                </div>
                <div class="cta">
                    <button class="more"><a href="{{route('about')}}">More Info</a></button>
                    <button class="video">View examples</button>
                </div>
            </div>
            <div class="cover">
                <img src="/img/home1.png" alt="show service" />
                <h3 class="text-on-image">Sigarette <br> G. e vinci <br> Ricariche</h3>
            </div>
        </section>
</main>
@endsection