@extends('layouts.layout_pre')
@section('content')
<script src="/js/about.js"> </script>
<main class="about">
    <div class="freccia-sxt">
        <img src="/img/freccia.png" alt="">
    </div>
    <section class="presentation-about">
        <article id='article1' style="display:flex" class="article-about">
            <div class="introduction-about">
                <div class="intro-text">
                    <h1>Possibilità di contabilizzare le vendite</h1>
                    <p>In maniera gratuita potrai capire quanti prodotti vendi nell'arco della tu giornata lavorativa
                    </p>
                </div>
                <div class="cta">
                    <button class="video">View examples</button>
                </div>

            </div>
            <div class="cover">
                <img src="/img/home1.png" alt="show service" />
            </div>
        </article>

        <article id="article2" style="display: none" class="article-about">
            <div class="introduction-about">
                <div class="intro-text">
                    <h1>Verificare gli incassi mensili</h1>
                    <p> Potrai senza alcuna difficoltà visionare i tuoi incassi mensili, al netto oppure lordi, registrando anche le spese</p>
                </div>
                <div class="cta">
                    <button class="video">View examples</button>
                </div>
            </div>
            <div class="cover">
                <img src="/img/home1.png" alt="show service" />
            </div>
        </article>


        <article id="article3" style="display: none" class="article-about">
            <div class="introduction-about">
                <div class="intro-text">
                    <h1>yes</h1>
                    <p>In maniera gratuita potrai capire quanti prodotti vendi nell'arco della tu giornata
                        lavorativa</p>
                </div>
                <div class="cta">
                    <button class="video">View examples</button>
                </div>
            </div>
            <div class="cover">
                <img src="/img/home1.png" alt="show service" />
            </div>
        </article>

    </section>
    <div class="freccia-dxt">
        <img src="/img/freccia.png" alt="" onclick="avanti(this)">
    </div>
</main>
@endsection